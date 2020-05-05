<!DOCTYPE html>
<html>
    <head>
        <title>Site Submission Results</title>
    </head>
    <body>
        <h1>Site Submission Results</h1>
    <?php
    // Extract form fields
    // 從欄位擷取
    $url = $_POST['url'];
    $email = $_POST['email'];

    // Check the URL
    // 檢查URL
    $url = parse_url($url);
    $host = $url['host'];

    if (!($ip = gethostbyname($host))) {
        echo 'Host for URL does noe have valid IP address.';
        exit;
    }

    echo 'Host ('.$host.') is at IP '.$ip.'<br/>';

    // Check  the email address
    // 檢查email 地址
    $email = explode('@', $email);
    $emailhost = $email[1];

    if (!getmxrr($emailhost, $maxhostsarr)) {
        echo 'Email address is not at valid host.';
        exit;
    }

    echo 'Email is delivered via: <br/>
    <ul>';

    foreach ($maxhostsarr as $mx) {
        echo '<li>'.$mx.'</li>';
    }

    echo '</ul>';

    // If reached here, all ok
    // 如果執行到這裡，代表一切都ok
    echo '<p>All submitted details are ok.</p>';
    echo '<p>Thank you for submitting your site.
    It will be visited by one of our staff members soon.</p>';
    // In real case, add to db of waiting sites...
    // 在實際情況下，會加入資料庫．．．
    ?>
    
    </body>
</html>