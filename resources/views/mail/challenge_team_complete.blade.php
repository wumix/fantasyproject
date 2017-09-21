@include('mail.email_header')
<tr>
    <td>
        Dear {{$reciever}}, <br>

        <p> User {{$sendername}} Team has been completed.
        </p>


    </td>
</tr>

@include('mail.email_footer')