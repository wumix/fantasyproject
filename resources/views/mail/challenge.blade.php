@include('mail.email_header')
<tr>
    <td>
        Dear {{$reciever}}, <br>

        <p> Your have been challenged by {{$sendername}} on <a href="http://www.gamithonfantasy.com/">www.gamithonfantasy.com</a>
        </p>


    </td>
</tr>

@include('mail.email_footer')