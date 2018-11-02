# PopBox Log Library
This library used by all PopBox Asia apps for centralized log remotely

# Install
composer require popbox/popbox-loging

# How to use

```php
class MyController{
    
    function doSomething(){
        $logger = new Popbox\Loging\Log('http://service-url','token');
        $data = array(
            'app_name' => 'APPNAME',
            'types'=> 'INFO',
            'content'=> $params
        );
        $logger->write($data);
        // you can put anything (object) in $params
    }
    
}
``` 
