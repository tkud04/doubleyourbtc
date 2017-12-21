<?php
namespace App\Helpers\Contracts;

Interface HelperContract
{
        public function sendEmail($to,$subject,$data,$view,$type);
        public function getTransactionID();
        public function addDeposit($data);
        public function addPayout($data);
        public function getDeposits();
        public function getPayouts();
        public function getLatestDeposits();
        public function getLatestPayouts();
}
 ?>