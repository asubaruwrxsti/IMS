<?php
    namespace App\Models;
    use CodeIgniter\Model;
    use Config\Database as ConfigDatabase;

    $db = ConfigDatabase::connect();

    class userModel extends Model{

        public function createUser($data){
            foreach ($data as $key){
                $sql = 'INSERT INTO users (ID, Username, Password) VALUES (:ID:, :Username:, :Password:)';
                $this->db->query($sql, [
                    'ID' => $key['ID'],
                    'Username' => $key['Username'],
                    'Password' => $key['Password']
                ]);
            }
        }

        public function editUser($data){
            foreach($data as $key){
                $sql = 'UPDATE users SET Username = :Username:, Password = :Password: WHERE users.id ='.$key['ID'];
                $this->db->query($sql, [
                    'Username' => $key['Username'],
                    'Password' => $key['Password']
                ]);
            }
        }

        public function deleteUser($id){
            $sql = 'DELETE FROM users WHERE users.id ='.$id;
            $this->db->query($sql);
        }

        public function checkLogin($data){
            foreach ($data as $key){
                $sql = 'SELECT 1 FROM users WHERE users.Username='.$key['Username'].' AND users.Password='.$key['Password'];
                $result = $this->db->query($sql);
            }

            return $result;
        }
    }
?>