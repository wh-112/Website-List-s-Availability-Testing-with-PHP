<?php


$urls = array("https://css-triscfszczxxzccks.com", "https://www.google.com", "https://css-triscfszczxxzccks.com");
foreach ($urls as $value){ 
       if (isDomainAvailible($value))
       {
               echo '<span style="color:green;text-align:center;">'.$value.'</span><br>';
       }
       else
       {
               echo "Woops, nothing found there.<br>";
       }
}
       //returns true, if domain is availible, false if not
       function isDomainAvailible($domain)
       {
               //check, if a valid url is provided
               if(!filter_var($domain, FILTER_VALIDATE_URL))
               {
                       return false;
               }

               //initialize curl
               $curlInit = curl_init($domain);
               curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
               curl_setopt($curlInit,CURLOPT_HEADER,true);
               curl_setopt($curlInit,CURLOPT_NOBODY,true);
               curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

               //get answer
               $response = curl_exec($curlInit);

               curl_close($curlInit);

               if ($response) return true;

               return false;
       }
?>
