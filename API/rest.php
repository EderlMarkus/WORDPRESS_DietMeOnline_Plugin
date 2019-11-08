<?php

/**
 * Class that defines all the relevant communcation with Wordpress-Auth and the Database
 */
class Rest
{

    protected $currentUser;

    /**
     * __construct
     * When Instance is created, load the WP-User Object
     * into the protected Variable $currentUser
     * If no User was found, set $currentUser to null
     * @return void
     */
    public function __construct()
    {
        if (!function_exists('wp_get_current_user')) {
            return null;
        }
        $this->currentUser = wp_get_current_user();

    }

    /**
     * getUserId
     *
     * @return integer current User ID
     */
    public function getUserId()
    {
        return $this->currentUser->ID;
    }

    /**
     * checkIfUserAdmin
     *
     * @return boolean if user is administrator or not
     */
    public function checkIfUserAdmin()
    {
        $user = $this->currentUser;
        return ($this->currentUser->roles[0] == "administrator");
    }

    /**
     * Echos JSON Message if something goes wrong and aborts script
     *
     * @param  string $code
     * @param  string $message
     *
     * @return void
     */
    public function throwError($code, $message)
    {
        header('content-type: application/json');
        $errMessage = json_encode(['error' => ['status' => $code, 'message' => $message]]);
        echo $errMessage;
        exit;
    }
}
