<?php

/**
 * Check user is logged in or not
 * 
 * @return boolean
 */
if (!function_exists('is_logged_in')) {
    function is_logged_in($key)
    {
        if (isset($_SESSION[$key . '_login']) && !empty($_SESSION[$key . '_login'])) {
            return true;
        }
        return false;
    }
}

/**
 * If user is not logged in then redirect to login page
 * 
 * @return void
 */
if (!function_exists('redirect_if_not_logged_in')) {
    function redirect_if_not_logged_in($user = 'admin', $path = 'login.php')
    {
        if (!is_logged_in($user)) {
            exit(header('location: ' . $path));
            die;
        }
    }
}

/**
 * Run sql query 
 * @return mixed
 */
if (!function_exists('runSql')) {
    function runSql($sql, $all = true)
    {
        global $con;

        $response = mysqli_query($con, $sql);

        if ($all) {

            $data = mysqli_fetch_all($response, MYSQLI_ASSOC);

            mysqli_free_result($response);

            return $data;
        }

        return mysqli_fetch_assoc($response);
    }
}

/**
 * Run sql query 
 * @return mixed
 */
if (!function_exists('insertSql')) {
    function insertSql($tableName, $data = [])
    {
        global $con;

        $sql = "INSERT INTO $tableName (";
        $sql .= implode(', ', array_keys($data));
        $sql .= ") VALUES ('";
        $sql .= implode("', '", array_values($data));
        $sql .= "')";

        if (mysqli_query($con, $sql)) {
            return true;
        }
        return false;
    }
}

/**
 * Run sql query 
 * @return mixed
 */
if (!function_exists('updateSql')) {
    function updateSql($tableName, $data = [], $where = [])
    {
        global $con;

        $sql = "UPDATE $tableName SET ";
        $sql .= implode(', ', array_map(
            function ($v, $k) {
                return sprintf("%s='%s'", $k, $v);
            },
            $data,
            array_keys($data)
        ));
        $sql .= " WHERE ";
        $sql .= implode(' AND ', array_map(
            function ($v, $k) {
                return sprintf("%s='%s'", $k, $v);
            },
            $where,
            array_keys($where)
        ));

        if (mysqli_query($con, $sql)) {
            return true;
        }
        return false;
    }
}

/**
 * Run sql query 
 * @return mixed
 */
if (!function_exists('deleteSql')) {
    function deleteSql($tableName, $where = [])
    {
        global $con;

        $sql = "DELETE FROM $tableName WHERE ";
        $sql .= implode(' AND ', array_map(
            function ($v, $k) {
                return sprintf("%s='%s'", $k, $v);
            },
            $where,
            array_keys($where)
        ));

        if (mysqli_query($con, $sql)) {
            return true;
        }
        return false;
    }
}

/**
 * Get setting
 * 
 * @return mixed
 */
if (!function_exists('settings')) {
    function settings($name, $default = null)
    {
        global $con;

        if (is_array($name)) {
            foreach ($name as $key => $value) {
                $check = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `settings` WHERE name = '$key'")) > 0;
                if ($check) {
                    $result = mysqli_query($con, "UPDATE settings SET value = '$value' WHERE name='$key'");
                } else {
                    $result = mysqli_query($con, "INSERT INTO `settings`(`name`, `value`) VALUES ('$key','$value')");
                }
            }
            return true;
        }

        $response = mysqli_query($con, "SELECT * FROM `settings` WHERE `name` = '$name'");

        $result = mysqli_fetch_assoc($response);

        return $result['value'] ?? $default;
    }
}

/**
 * Dump and die 
 * @return void
 */
if (!function_exists('dump')) {
    function dump()
    {
        foreach (func_get_args() as $data) {
            echo '<div style="
            padding: 15px;
            width: 800px;
            overflow: scroll;
            background: antiquewhite;
            margin: 20px auto;">';
            highlight_string("<?php\n\n" . var_export($data, true) . "\n\n?>\n");
            echo '</div>';
        }
    }
}

/**
 * Dump and die 
 * @return void
 */
if (!function_exists('dd')) {
    function dd()
    {
        dump(...func_get_args());
        die;
    }
}

/**
 * Flash message 
 * 
 * @param string|array $identifier
 * @param mixed $default
 * @return void
 */
if (!function_exists('flash_message')) {
    function flash_message($identifier, $default = null)
    {
        $prefix = 'flash_message_';

        if (is_array($identifier)) {
            foreach ($identifier as $key => $value) {
                $_SESSION[$prefix . $key] = $value;
            }
            return;
        }

        if (isset($_SESSION[$prefix . $identifier])) {
            $value = $_SESSION[$prefix . $identifier];
            unset($_SESSION[$prefix . $identifier]);
            return $value;
        }

        return $default;
    }
}

/**
 * Show Alert Message
 * 
 * @param string $message
 * @param string $type
 * @return string
 */
if (!function_exists('alert_message')) {
    function alert_message($message, $type = 'success')
    {
        return '<div class="alert alert-' . $type . '" role="alert">' . $message . '</div>';
    }
}
