
@include('mail.email_header')

    <tr>
        <td>
            Dear User, <br>
           your refferal code is<br>
            <a href="{{$refferal_code}}">Your Code</a>

        </td>
    </tr>


@include('mail.email_footer')