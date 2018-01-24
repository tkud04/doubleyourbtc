<?php
namespace App\Helpers\Contracts;

Interface HelperContract
{
        public function sendEmail($to,$subject,$data,$view,$type);
        public function getTransactionID();
        public function getStatusNumber();
        public function addDeposit($data);
        public function addPayout($data);
        public function getDeposits($wallet);
        public function getPayouts($wallet);
        public function getLatestDeposits();
        public function getLatestPayouts();
}
 ?>