<?php

// Check if the number parameter is present in the URL
if(isset($_GET['number'])) {
    $phoneNumber = $_GET['number'];

    // Your API URL
    $url = "https://app.mynagad.com:20002/api/user/check-user-status-for-log-in";

    // Headers
    $headers = array(
        "X-KM-User-AspId: 100012345612345",
        "X-KM-User-Agent: ANDROID/1152",
        "X-KM-DEVICE-FGP: 19DC58E052A91F5B2EB59399AABB2B898CA68CFE780878C0DB69EAAB0553C3C6",
        "X-KM-Accept-language: bn",
        "X-KM-AppCode: 01"
    );

    // Append the phone number to the URL
    $url .= "?number=" . urlencode($phoneNumber);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

    if(curl_errno($ch)){
        echo 'Curl error: ' . curl_error($ch);
    }

    curl_close($ch);

    // Now $response contains the response from the server
    echo $response;
} else {
    // If number parameter is not present, show an error message
    echo "Error: Phone number not provided in the URL.";
}
?>