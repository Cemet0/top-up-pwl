<?php

namespace App\Models;

class UserModel
{
    private string $filePath;

    public function __construct()
    {
        $this->filePath = WRITEPATH . 'users.json';
        
        // Auto-initialize directories and default users if file doesn't exist
        if (!file_exists($this->filePath)) {
            $dir = dirname($this->filePath);
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            
            $defaultUsers = [
                [
                    'id' => 1,
                    'username' => 'admin',
                    'password' => password_hash('admin', PASSWORD_DEFAULT),
                    'role' => 'Administrator',
                    'email' => 'admin@dantestore.com',
                    'created_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 2,
                    'username' => 'client',
                    'password' => password_hash('client', PASSWORD_DEFAULT),
                    'role' => 'Client',
                    'email' => 'client@gmail.com',
                    'created_at' => date('Y-m-d H:i:s')
                ]
            ];
            
            file_put_contents($this->filePath, json_encode($defaultUsers, JSON_PRETTY_PRINT));
        }
    }

    /**
     * Retrieve all users
     */
    public function getUsers(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }
        $data = file_get_contents($this->filePath);
        return json_decode($data, true) ?? [];
    }

    /**
     * Find a user by their username
     */
    public function findByUsername(string $username): ?array
    {
        $users = $this->getUsers();
        foreach ($users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return $user;
            }
        }
        return null;
    }

    /**
     * Save a user (either insert or update)
     */
    public function save(array $data): int
    {
        $users = $this->getUsers();
        
        if (isset($data['id'])) {
            // Update existing user
            foreach ($users as &$user) {
                if ($user['id'] == $data['id']) {
                    $user = array_merge($user, $data);
                    break;
                }
            }
            $userId = (int)$data['id'];
        } else {
            // Create new user
            $newId = count($users) > 0 ? max(array_column($users, 'id')) + 1 : 1;
            $data['id'] = $newId;
            $data['role'] = $data['role'] ?? 'Client';
            $data['created_at'] = date('Y-m-d H:i:s');
            $users[] = $data;
            $userId = $newId;
        }
        
        file_put_contents($this->filePath, json_encode($users, JSON_PRETTY_PRINT));
        return $userId;
    }
}
