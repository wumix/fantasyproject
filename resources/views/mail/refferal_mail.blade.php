
@include('mail.email_header')

    <tr>
        <td>
            Dear User, <br>
           your refferal code is<br>
            {{$refferal_code}}
        </td>
    </tr>


@include('mail.email_footer')