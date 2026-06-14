/**
 * FluidGlass - High-Fidelity Custom WebGL Liquid Glass Shader (iOS 26 Style)
 * Developed for Dante Store
 */

class FluidGlass {
    constructor(element, options = {}) {
        this.container = typeof element === 'string' ? document.querySelector(element) : element;
        if (!this.container) return;

        this.options = Object.assign({
            mode: 'navbar', // 'navbar' or 'footer'
            intensity: 1.0
        }, options);

        this.init();
    }

    init() {
        // 1. Setup Container and Canvas positioning
        if (window.getComputedStyle(this.container).position === 'static') {
            this.container.style.position = 'relative';
        }

        this.canvas = document.createElement('canvas');
        this.canvas.className = 'fluid-glass-canvas';
        this.canvas.style.position = 'absolute';
        this.canvas.style.top = '0';
        this.canvas.style.left = '0';
        this.canvas.style.width = '100%';
        this.canvas.style.height = '100%';
        this.canvas.style.zIndex = '0';
        this.canvas.style.pointerEvents = 'none';
        this.canvas.style.mixBlendMode = 'screen'; // Blends glowing specular lights perfectly
        this.container.prepend(this.canvas);

        // 2. Initialize Three.js Scene, Camera, Renderer
        this.width = this.container.clientWidth;
        this.height = this.container.clientHeight;

        this.scene = new THREE.Scene();
        
        // Orthographic camera for full-screen shader rendering
        this.camera = new THREE.OrthographicCamera(-1, 1, 1, -1, 0, 1);

        this.renderer = new THREE.WebGLRenderer({
            canvas: this.canvas,
            alpha: true,
            antialias: true,
            powerPreference: 'high-performance'
        });
        this.renderer.setSize(this.width, this.height);
        this.renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

        // 3. Create Fluid Glass Shader Material
        this.initShaderMaterial();

        // 4. Setup Interactions & Events
        this.pointer = new THREE.Vector2(0, 0);
        this.targetPointer = new THREE.Vector2(0, 0);
        
        this.container.addEventListener('mousemove', (e) => {
            const rect = this.container.getBoundingClientRect();
            // Convert to normalized coordinates [-1, 1] matching shader space
            const x = ((e.clientX - rect.left) / this.width) * 2 - 1;
            const y = -((e.clientY - rect.top) / this.height) * 2 + 1;
            this.targetPointer.set(x, y);
        });

        this.container.addEventListener('mouseleave', () => {
            this.targetPointer.set(0, -2); // Move out of viewport when cursor leaves
        });

        // 5. Start Animation Loop
        this.time = 0;
        this.animate = this.animate.bind(this);
        this.animate();

        // 6. Resize Handler
        window.addEventListener('resize', () => this.onResize());
    }

    initShaderMaterial() {
        const vertexShader = `
            varying vec2 vUv;
            void main() {
                vUv = uv;
                gl_Position = vec4(position, 1.0);
            }
        `;

        // Highly customized fragment shader simulating realistic glossy, flowing liquid glass reflections.
        const fragmentShader = `
            uniform float time;
            uniform vec2 resolution;
            uniform vec2 pointer;
            uniform float intensity;
            varying vec2 vUv;

            void main() {
                vec2 uv = vUv;
                vec2 p = uv * 2.0 - 1.0;
                p.x *= resolution.x / resolution.y;

                // Mouse interaction coordinates
                vec2 m = pointer;
                m.x *= resolution.x / resolution.y;
                float distToMouse = length(p - m);

                // Smooth influence radius around mouse
                float mouseInfluence = smoothstep(1.2, 0.0, distToMouse);

                // Create organic warping fluid coordinates (liquid glass waves)
                float t = time * 0.25;
                vec2 warp = p;
                for(float i = 1.0; i < 4.0; i++) {
                    warp.x += sin(warp.y + t + mouseInfluence * 1.4) * 0.3 / i;
                    warp.y += cos(warp.x + t + mouseInfluence * 1.1) * 0.25 / i;
                }

                // Generates wave heights
                float wave = sin(warp.x * 2.5) * cos(warp.y * 2.5) * 0.5 + 0.5;

                // Calculate glass normals for specularity calculations
                vec3 normal = normalize(vec3(
                    cos(warp.x * 2.5) * 0.12 * intensity,
                    sin(warp.y * 2.5) * 0.12 * intensity,
                    1.0
                ));

                vec3 lightDir = normalize(vec3(1.0, 1.2, 2.0));
                vec3 viewDir = vec3(0.0, 0.0, 1.0);
                vec3 halfDir = normalize(lightDir + viewDir);

                // Glossy Blinn-Phong specular glints
                float spec = pow(max(dot(normal, halfDir), 0.0), 96.0) * 0.85;
                float softSpec = pow(max(dot(normal, halfDir), 0.0), 16.0) * 0.35;

                // Fresnel edge glow reflection
                float fresnel = pow(1.0 - max(dot(normal, viewDir), 0.0), 4.0) * 0.3;

                // Soft, premium iOS-style colored highlights (electric blue / purple / white sheen)
                vec3 colBlue = vec3(0.05, 0.38, 1.0);     // Brand Blue
                vec3 colPurple = vec3(0.55, 0.15, 1.0);   // Deep Violet
                vec3 liquidCol = mix(colBlue, colPurple, wave);

                // Ambient reflection sheen
                vec3 sheen = vec3(1.0) * (spec + softSpec + fresnel);

                // Blend colors: glossy parts are fully white, base waves are subtle blue
                vec3 finalColor = mix(liquidCol * 0.2, vec3(1.0), spec * 0.95 + softSpec * 0.4);

                // Add a glowing trail following the mouse
                finalColor += vec3(0.08, 0.25, 0.5) * mouseInfluence * 0.3;

                // Alpha mapping to keep the glass sheet mostly transparent and clean,
                // while highlighting the reflective liquid waves and gloss points
                float alpha = 0.05 + (spec * 0.7) + (softSpec * 0.15) + (fresnel * 0.1) + (mouseInfluence * 0.06);

                gl_FragColor = vec4(finalColor + sheen * 0.1, alpha * intensity);
            }
        `;

        this.uniforms = {
            time: { value: 0 },
            resolution: { value: new THREE.Vector2(this.width, this.height) },
            pointer: { value: new THREE.Vector2(0, -2) },
            intensity: { value: this.options.intensity }
        };

        const bgGeo = new THREE.PlaneGeometry(2, 2);
        this.bgMat = new THREE.ShaderMaterial({
            vertexShader,
            fragmentShader,
            uniforms: this.uniforms,
            depthWrite: false,
            transparent: true
        });

        this.bgMesh = new THREE.Mesh(bgGeo, this.bgMat);
        this.scene.add(this.bgMesh);
    }

    animate() {
        requestAnimationFrame(this.animate);

        this.time += 0.04;

        // 1. Update time uniform
        if (this.uniforms) {
            this.uniforms.time.value = this.time;
        }

        // 2. Interpolate mouse positions
        this.pointer.lerp(this.targetPointer, 0.08);
        if (this.uniforms) {
            this.uniforms.pointer.value.copy(this.pointer);
        }

        // 3. Render scene
        this.renderer.render(this.scene, this.camera);
    }

    onResize() {
        this.width = this.container.clientWidth;
        this.height = this.container.clientHeight;

        this.renderer.setSize(this.width, this.height);
        
        if (this.uniforms) {
            this.uniforms.resolution.value.set(this.width, this.height);
        }
    }
}

// Export globally
window.FluidGlass = FluidGlass;
