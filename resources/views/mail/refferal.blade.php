
@include('mail.email_header')
<<<<<<< HEAD
    <tr>
        <td>
            Dear {{$name}}, <br>
            Congratulations!
           <p> COngratulations You have won   <a href="http://www.gamithonfantasy.com/">www.gamithonfantasy.com</a>
           </p>

            Keep yourself pumped up for exciting prizes on your way! Good luck. <br><br>

        </td>
    </tr>
=======
<tr>
    <td>
        Dear {{$name}}, <br>
        Congratulations!
        <p> COngratulations You have won   <a href="http://www.gamithonfantasy.com/">www.gamithonfantasy.com</a>
        </p>

        Keep yourself pumped up for exciting prizes on your way! Good luck. <br><br>

    </td>
</tr>
>>>>>>> master

@include('mail.email_footer')