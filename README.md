# Rutter

A simple Router class

* RESTful routing
* methods for each HTTP verb (one day)
* URL parameters

##How to 

    <?php
        require_once 'vendor/autoload.php';

        $request = new Rutter\Request($_SERVER);

        $rutter = new Rutter\Router($request);

        $rutter->get('/', function($r)
        {
            echo 'rutt';
        });

        $rutter->get('/ciao', function()
        {
            echo 'ciao';
        });

        $rutter->post('/', function($rutt)
        {
            var_dump($rutt->getRequest());
        });


        try 
        {
            echo $rutter->rutta();  
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

## License
MIT Licensed, http://www.opensource.org/licenses/MIT