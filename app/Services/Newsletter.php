<?php
namespace App\Services;


use MailchimpMarketing\ApiClient;

class Newsletter
{
 public function subscribe(string $email, string $list=null){
     $list ??= config('services.mailchimp.lists.subscriberse');

     return $this->clients()->lists->addListMember($list, [
         "email_address" => $email,
         "status" => "subscribed",
     ]);
}
protected function clients(){
    return (new ApiClient())->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us20'
    ]);
}
}