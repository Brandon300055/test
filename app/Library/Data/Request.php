<?php

namespace App\Library\Data;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class Request
{

    /**
     * @var string
     */
    protected $URL;

    /**
     * @var string
     */
    protected $type;


    /**
     * Request Constructor.
     */
    function __construct()
    {

    }

    /**
     * Url Setter.
     * @param string $url
     * @return $this
     */
    protected function setURL(string $url) : self
    {
        $this->URL = strip_tags($url);
        return $this; // return self
    }

    /**
     * Type Setter.
     * @param string $type
     * @return $this
     */
    protected function setType(string $type) : self
    {
        $this->type = urlencode( $type );
        return $this; // return self
    }

    /**
     * Set Post Object.
     * @param string $post
     * @return $this
     */
    protected function setPost(string $post) : self
    {
        $this->post = urlencode( $post );
        return $this; // return self
    }

    /**
     * Executes and returns the API request.
     * @return Application|ResponseFactory|Response
     */
    protected function request()
    {
        // init curl
        $ch = curl_init();

        // construct curl request
        curl_setopt($ch, CURLOPT_URL, $this->URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        // construct header and auth
        $headers = array();
        $headers[] = '';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // send curl request and handle errors
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        // close curl
        curl_close($ch);

        // return result
        return json_decode($result,TRUE);
    }


}
