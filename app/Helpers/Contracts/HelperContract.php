<?php
namespace App\Helpers\Contracts;

Interface HelperContract
{
        public function sendEmail($to,$subject,$data,$view,$type);
        public function getTransactionID();
        public function getStatusNumber();
        public function addDeposit($data);
        public function addPayout($data);
        public function getDeposits();
        public function getDeposits($email);
        public function getPayouts();
        public function getPayouts($email);
        public function getLatestDeposits();
        public function getLatestPayouts();
}
 ?>