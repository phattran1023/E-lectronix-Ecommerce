<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset - [E-lectronix.com]</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; padding: 0;">

<div style="background-color: #ffffff; max-width: 600px; margin: 20px auto; padding: 20px; border-radius: 10px; box-shadow: 0px 3px 10px rgba(0,0,0,0.1);">
    <h1 style="color: #333;">Password Reset - [E-lectronix.com]</h1>
    <p>Dear {{ $userName }},</p>
    <p>We hope this email finds you well. It seems you've requested to reset your password for your [E-lectronix.com] account. No worries, we've got you covered! Please follow the simple steps below to get back into your account:</p>
    <ol>
        <li>
            <strong>Click the Reset Button Below:</strong>
            <p><a href="{{ $resetUrl }}" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Reset Password</a></p>
            <p>This link will expire in {{ $expirationTime->diffForHumans(now()) }}.</p>
        </li>
        <li>
            <strong>Create a New Password:</strong>
            <p>You'll be directed to a secure page where you can set up a new password. Make sure it's strong and unique to keep your account safe.</p>
        </li>
        <li>
            <strong>Access Your Account:</strong>
            <p>Once you've reset your password, you can log in using your new credentials. Your account will be right where you left it!</p>
        </li>
    </ol>
    <p>If you didn't request a password reset, please ignore this email. Your account security is important to us, and you can rest assured that no changes have been made.</p>
    <p>Thank you for being a valued member of [E-lectronix.com]. If you have any questions or need assistance, feel free to reach out to our support team at <a href="mailto:phattran1023@gmail.com">phattran1023@gmail.com</a>.</p>
    <p>Best regards,<br>The [E-lectronix.com] Team</p>
</div>

<p style="text-align: center; color: #888; font-size: 12px;">This email was sent to You based on a request initiated by the user. If you didn't initiate this request, please disregard this email. Your account security is our priority.</p>

</body>
</html>
