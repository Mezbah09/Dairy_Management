<?php

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
