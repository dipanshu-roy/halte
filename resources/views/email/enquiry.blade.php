<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div style="width:100%">
  <p>{{$name}} have enquery on {{config('app.name')}}.</p>
  <p>Details are mention bellow:</p>
    <table class="attributes" width="100%" cellpadding="0" cellspacing="0"
        role="presentation">
        <tr>
            <td class="attributes_content">
                <table width="100%" cellpadding="0" cellspacing="0"
                    role="presentation">
                    <tr>
                        <td class="attributes_item">
                            <span class="f-fallback">
                                <strong>Name:{{$name}}</strong>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="attributes_item">
                            <span class="f-fallback">
                                <strong>Email:</strong> {{$email}}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="attributes_item">
                            <span class="f-fallback">
                                <strong>Mobile:</strong> {{$mobile}}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="attributes_item">
                            <span class="f-fallback">
                                <strong>Description:</strong> {{$description}}
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
