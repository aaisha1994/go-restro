<!DOCTYPE html>
<html>
<head>
    <title>Confirm your email address on Go-Restro</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p style="font-size:20px;line-height:28px;letter-spacing:-0.2px;margin-bottom:28px;word-break:break-word">
        Once you’ve confirmed that <strong>
            <a href="mailto:{{ $details['email'] }}" target="_blank">{{ $details['email'] }}</a>
        </strong> is your email address, we’ll help you find your Go-Restro workspaces or create a new one.
    </p>

    <p style="font-size:16px;line-height:24px;letter-spacing:-0.2px;margin-bottom:28px">
        <img data-emoji="📱" class="an1" alt="📱" aria-label="📱" src="https://fonts.gstatic.com/s/e/notoemoji/15.0/1f4f1/32.png" loading="lazy">
        <strong>From your mobile device</strong>, tap the button below to confirm:
    </p>

    <table style="width:100%">
        <tbody>
            <tr style="width:100%">
                <td style="width:100%">
                    <span style="display:inline-block;border-radius:4px;background-color:#611f69;width:100%;text-align:center" class="m_888255172558146439button_link_wrapper m_888255172558146439plum">
                        <a href="{{ $details['url'] }}" style="border:20px solid #611f69;border-radius:4px;background-color:#611f69;color:#ffffff;font-size:16px;line-height:18px;word-break:break-word;font-weight:bold;font-size:14px;line-height:14px;letter-spacing:0.8px;text-transform:uppercase;box-sizing:border-box;width:100%;text-align:center;display:inline-block;font-weight:900;text-decoration:none!important" target="_blank" data-saferedirecturl="https://www.google.com/url?q={{ $details['url'] }}">Confirm email address</a>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="font-size:16px;line-height:24px;letter-spacing:-0.2px;margin-bottom:28px;margin-top:40px">If you haven’t requested this email, there’s nothing to worry about – you can safely ignore it.</p>

    <p>Thank you</p>
</body>
</html>
