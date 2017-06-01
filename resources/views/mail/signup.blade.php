
@include('mail.email_header')
    <tr>
        <td>
            Dear {{$name}}, <br>
            Congratulations!
           <p> We are so excited to inform you that you just made your mark on this weeks
            Leader Board! Have a look at it yourself and don't forgot to showoff your
            success among your fellow friends!:D <a href="http://www.gamithonfantasy.com/">www.gamithonfantasy.com</a>
           </p>

            Keep yourself pumped up for exciting prizes on your way! Good luck. <br><br>

        </td>
    </tr>

@include('mail.email_footer')