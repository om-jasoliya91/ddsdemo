<?php

class User
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function insert(array $data, array $files): bool
    {
        $profile = null;

        if (isset($files['profile']) && $files['profile']['error'] === 0) {
            $ext = pathinfo($files['profile']['name'], PATHINFO_EXTENSION);
            $profile = time() . '_' . rand(100, 999) . '.' . $ext;
            move_uploaded_file(
                $files['profile']['tmp_name'],
                BASE_PATH . '/public/uploads/' . $profile
            );
        }

        $name     = mysqli_real_escape_string($this->conn, $data['name']);
        $email    = mysqli_real_escape_string($this->conn, $data['email']);
        $password = mysqli_real_escape_string($this->conn, $data['password']);
        $hobby    = mysqli_real_escape_string($this->conn, $data['hobby']);

        $sql = "INSERT INTO users (name,email,password,hobby,profile)
                VALUES ('$name','$email','$password','$hobby','$profile')";

        return mysqli_query($this->conn, $sql);
    }

    public function getAll(): array
    {
        $res = mysqli_query($this->conn, "SELECT * FROM users ORDER BY id DESC");
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }

    public function find($id): ?array
    {
        $id = (int)$id;
        $res = mysqli_query($this->conn, "SELECT * FROM users WHERE id=$id");
        $user = mysqli_fetch_assoc($res);

        if ($user && $user['hobby']) {
            $user['hobby'] = explode(',', $user['hobby']);
        }

        return $user ?: null;
    }

    public function update($data, $files): bool
    {
        if (empty($data['id'])) return false;

        $id = (int)$data['id'];

        $res = mysqli_query($this->conn, "SELECT profile FROM users WHERE id=$id");
        $old = mysqli_fetch_assoc($res);
        $profile = $old['profile'] ?? null;

        if (isset($files['profile']) && $files['profile']['error'] === 0) {

            if ($profile && file_exists(BASE_PATH . '/public/uploads/' . $profile)) {
                unlink(BASE_PATH . '/public/uploads/' . $profile);
            }

            $ext = pathinfo($files['profile']['name'], PATHINFO_EXTENSION);
            $profile = time() . '_' . rand(100, 999) . '.' . $ext;

            move_uploaded_file(
                $files['profile']['tmp_name'],
                BASE_PATH . '/public/uploads/' . $profile
            );
        }

        $name  = mysqli_real_escape_string($this->conn, $data['name']);
        $email = mysqli_real_escape_string($this->conn, $data['email']);
        $hobby = isset($data['hobby']) ? implode(',', $data['hobby']) : '';
        $hobby = mysqli_real_escape_string($this->conn, $hobby);

        $sql = "UPDATE users 
                SET name='$name', email='$email', hobby='$hobby', profile='$profile'
                WHERE id=$id";

        return mysqli_query($this->conn, $sql);
    }

    public function delete($id): bool
    {
        $id = (int)$id;

        $res = mysqli_query($this->conn, "SELECT profile FROM users WHERE id=$id");
        $user = mysqli_fetch_assoc($res);

        if ($user && $user['profile']) {
            $path = BASE_PATH . '/public/uploads/' . $user['profile'];
            if (file_exists($path)) unlink($path);
        }

        return mysqli_query($this->conn, "DELETE FROM users WHERE id=$id");
    }
}
