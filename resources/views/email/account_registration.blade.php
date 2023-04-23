<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div style="width:100%">
  <p>Hii {{$name}},<br/>You have successfully created account on {{date('d-M-Y H:i:s')}}.</p>
  <p>For reference, here's your login information:</p>
    <table class="attributes" width="100%" cellpadding="0" cellspacing="0"
        role="presentation">
        <tr>
            <td class="attributes_content">
                <table width="100%" cellpadding="0" cellspacing="0"
                    role="presentation">
                    <tr>
                        <td class="attributes_item">
                            <span class="f-fallback">
                                <strong>Login URL:</strong>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="attributes_item">
                            <span class="f-fallback">
                                <strong>Username:</strong> {{$email}}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="attributes_item">
                            <span class="f-fallback">
                                <strong>Password:</strong> {{$password}}
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
