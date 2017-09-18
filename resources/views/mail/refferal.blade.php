
@include('mail.email_header')

<tr>
    <td>
        Dear {{$name}}, <br>
        Congratulations!
        <p> COngratulations You have won   <a href="http://www.gamithonfantasy.com/">www.gamithonfantasy.com</a>
        </p>

        Keep yourself pumped up for exciting prizes on your way! Good luck. <br><br>

    </td>
</tr>


@include('mail.email_footer')