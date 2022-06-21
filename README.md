
# SMS, Email and Voice notifications

## Easy to use

This library is designed to be an easy way to use Afilnet API services. You can send SMS, email and voice notifications using your Afilnet account.
This package can be installed with composer using "[composer require afilnet/afilnet-api](https://packagist.org/packages/afilnet/afilnet-api)".

You only need an Afilnet account with enought credits.
If you do not have an account, you can [create it](http://afilnet.us/client/register.php) in a few minutes.

## Index

* [About Afilnet](#afilnet)
    *  [Our website](#website)
* [Setup](#setup)
* [API Services](#afilnet-api-service)
    * [SMS](#sms)
    * [Email](#email)
    * [Voice](#voice)
* [Response](#response)


---

## Afilnet

![Afilnet Cloud Marketing Logo](https://afilnet.com/img/logodesignb.png)

Afilnet is a company dedicated to Cloud Marketing.

With this module we seek to facilitate the use of the services we offer through our API.

We offer support to our clients if they have some trouble with their accounts or our services.

If you notice some error or bugs, feel free to contact us.

### Website
We are available in 3 different languages:
- [Español - www.afilnet.com](https://www.afilnet.com/) 
- [English - www.afilnet.com/en/](https://www.afilnet.com/en/) 
- [Français - www.afilnet.com/fr/](https://www.afilnet.com/fr/) 


[back to top](#index)


---

## Setup

**ATTENTION: You need an Afilet account with credits to use this module**

*If you dont have an account, [visit our web page](#website) and create it.*

*After that, you will have to buy some credits to be able to send the notifications*

*We have a promo to test the services which give you 10 credits for free*

Once you have an account, we are ready to setup the module in your app:
 
The first step is install the module, you can install it using composer or manual installation
Composer: "[composer require afilnet/afilnet-api](https://packagist.org/packages/afilnet/afilnet-api)".
Then create the object:

```php 
<?php
$afilnet = new \Afilnet\Afilnet();
?>
```

Then login with your account (If you dont login successfully, all services will return error bad username or password).

```php 
<?php
if ($afilnet->login("username","password")){
    //You have logged in successfully
} else {
    //Bad credentials, you must login to use the services
}
?>
```

And now we are ready to use the services :)


[back to top](#index)


---


## Afilnet API Services

There are 3 channels availables:
- [Send SMS](#sms)
- [Send Email](#email)
- [Send Voice](#voice)

This library use the structure: 
```php 
<?php
$afilnet->channel->service($params);
?>
```

The three channels have the same services:
- send (Send to a single user)
- sendFromTemplate (Send to a single user using a template)
- sendToGroup (Send to a defined group)
- sendToGroupFromTemplate (Send to a defined group using a template)
- getDeliveryStatus (Get delivery status of a message)

---

### SMS

If you want to use SMS you only need to call the object sms and the service required.

#### Services
```php 
<?php
//SEND
$array = $afilnet->sms->send(
    'from',
    'to', 
    'msg',
    'scheduledatetime', // (optional) 
    'output' // (optional)
);

//SEND FROM TEMPLATE
$array = $afilnet->sms->sendFromTemplate(
    'to', 
    'idTemplate', 
    'params', // (optional) 
    'scheduledatetime', // (optional) 
    'output' // (optional) 
);

//SEND TO GROUP
$array = $afilnet->sms->sendToGroup(
   'from', 
   'countryCode', 
   'idGroup', 
   'msg', 
   'scheduledatetime', // (optional) 
   'output' // (optional) 
);

//SEND TO GROUP FROM TEMPLATE
$array = $afilnet->sms->sendToGroupFromTemplate(
    'countryCode', 
    'idGroup', 
    'idTemplate', 
    'scheduledatetime', // (optional) 
    'output' // (optional) 
);

// GET DELIVERY STATUS
$array = $afilnet->sms->getDeliveryStatus('idMessage');
?>
```


#### Example

```php 
<?php
$to = "34600000000";
$message = "Hey Luke, I want to tell you something... I am your father.";
$from = "Darth Vader";

$result = $afilnet->sms->send(
    to,
    message,
    from
);

if (result['status']=="SUCCESS"){
    echo("Nooooo!!!!!11");
} else { // == "ERROR"
    echo("I have not received any sms :(");
}
?>
```


[back to top](#index)


---

### Email

If you want to use Email you only need to call the object sms and the service required.

#### Services

```php 
<?php
//SEND
$array = $afilnet->email->send(
    'subject',
    'to', 
    'msg',
    'scheduledatetime', // (optional) 
    'output' // (optional)
);

//SEND FROM TEMPLATE
$array = $afilnet->email->sendFromTemplate(
    'to', 
    'idTemplate', 
    'params', // (optional) 
    'scheduledatetime', // (optional) 
    'output' // (optional) 
);

//SEND TO GROUP
$array = $afilnet->email->sendToGroup(
   'subject', 
   'idGroup', 
   'msg', 
   'scheduledatetime', // (optional) 
   'output' // (optional) 
);

//SEND TO GROUP FROM TEMPLATE
$array = $afilnet->email->sendToGroupFromTemplate(
    'idGroup', 
    'idTemplate', 
    'scheduledatetime', // (optional) 
    'output' // (optional) 
);

// GET DELIVERY STATUS
$array = $afilnet->email->getDeliveryStatus('idMessage');
?>
```

#### Example

```php 
<?php
$subject = "I have a surprise for you - Darth Vader";
$to = "luke_skywalker@newjediorder.com";
$message = "<h2>I am your father.</h2><hr><p>Hehehe surprise.</p><p>Best wishes, Darth Vader.</p>";

$result = $afilnet->email->send(
    subject,
    to,
    message
);

if (result['status']=="SUCCESS"){
    echo("Nooooo!!!!!11");
} else { // == "ERROR"
    echo("I have not received any email :(");
}
?>
```


[back to top](#index)


---

### Voice

If you want to use Voice you only need to call the object sms and the service required.

#### Services

```php 
<?php
//SEND
$array = $afilnet->voice->send(
    'to', 
    'msg',
    'lang', // (optional) 
    'scheduledatetime', // (optional) 
    'output' // (optional)
);

//SEND FROM TEMPLATE
$array = $afilnet->voice->sendFromTemplate(
    'to', 
    'idTemplate', 
    'params', // (optional) 
    'scheduledatetime', // (optional) 
    'output' // (optional) 
);

//SEND TO GROUP
$array = $afilnet->voice->sendToGroup(
   'countryCode', 
   'idGroup', 
   'msg', 
   'scheduledatetime', // (optional) 
   'output' // (optional) 
);

//SEND TO GROUP FROM TEMPLATE
$array = $afilnet->voice->sendToGroupFromTemplate(
    'countryCode', 
    'idGroup', 
    'idTemplate', 
    'scheduledatetime', // (optional) 
    'output' // (optional) 
);

// GET DELIVERY STATUS
$array = $afilnet->voice->getDeliveryStatus('idMessage');
?>
```

#### Example

```php 
<?php
$to = "346000000";
$message = "Hey Luke, I want to tell you something... I... am... your father.";
$lang = "EN";

$result = $afilnet->voice->send(
    to,
    message,
    lang
);

if (result['status']=="SUCCESS"){
    echo("Wait, what?!... Nooooo!");
} else { // == "ERROR"
    echo("I have not received any phone call");
}


afilnet.sendEmail(
    to,
    message,
    function(result){
        if (result.status=="SUCCESS"){
            echo("Wait, what?!... Nooooo!");
        } else { // == "ERROR"
            echo("I have not received any phone call");
        }
    },
    lang
);
?>
```

[back to top](#index)


---


### RESPONSE
  
All services receive similar parameters but all return same array (json decoded).

The services will return an array with the next structure:
* status
* error (if status=ERROR), here you will receive the error code
* result (if status=SUCCESS), here you will receive the following values:
    *  messageid
    *  credits
 
#### ERROR CODES

Code | Description
--- | --- | ---
MISSING_USER | User or email not included
MISSING_PASSWORD | Password not included
MISSING_CLASS | Class not included
MISSING_METHOD | Method not included
MISSING_COMPULSORY_PARAM | Compulsory parameter not included
INCORRECT_USER_PASSWORD | Incorrect user or password
INCORRECT_CLASS | Incorrect class
INCORRECT_METHOD | Incorrect method
NO_ROUTE_AVAILABLE | There are no available paths for the indicated destination
NO_CREDITS | Your balance is insufficient
 
#### Example

*Example for $afilnet->sms->send:

- If everything is ok:
```php 
<?php
$result = [
    "status" => "SUCCESS",
    "result" => [
        "messageid" => "id_from_message",
        "credits" => "credits_spent"
    ]    
]
?>
```

- If something went bad:
```php 
<?php
$result = [
    "status" => "ERROR",
    "error" => "error_message"  
]
?>
```


[back to top](#index)


---
