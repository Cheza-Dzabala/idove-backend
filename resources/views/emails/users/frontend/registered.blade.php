@extends('emails.layouts.mail')

@section('subject')
    Welcome {{ $user->full_name }}
@endsection

@section('body')
<td class="esd-container-frame" width="600" valign="top" align="center">
    <table style="border-radius: 4px; border-collapse: separate; background-color: #ffffff;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
        <tbody>
            <tr>
                <td class="esd-block-text es-p20t es-p20b es-p30r es-p30l es-m-txt-l" bgcolor="#ffffff" align="center">
                    <p>We are really excited to have you on the iDove digital platform.</p>
                </td>
            </tr>
            <tr>
                <td class="esd-block-text es-p20t es-p20b es-p30r es-p30l es-m-txt-l" bgcolor="#ffffff" align="center">
                    <p>Please follow <a href="{{ env('FRONTEND_PATH').'/verify-account?token='.$token }}">this link</a> to activate your account. <br/>
                    </p>
                    <small>If you cannot click the link, copy and past this url into your browser. {{ env('FRONTEND_PATH').'/verify-account?token='.$token }}</small>
                </td>
            </tr>

            <tr>
                <td class="esd-block-text es-p20t es-p30r es-p30l es-m-txt-l" align="left">
                    <p>If something happens and you cannot activate your account, please reach out to the idove admins at:
                        <a href="mailto:support@idove.au.int"> <small>support@idove.au.int</small></a></p>
                </td>
            </tr>
            <tr>
                <td class="esd-block-text es-p20t es-p30r es-p30l es-m-txt-l" align="left">
                    <p>If you have any questions, just reply to this email—we're always happy to help out.</p>
                </td>
            </tr>
            <tr>
                <td class="esd-block-text es-p20t es-p40b es-p30r es-p30l es-m-txt-l" align="left">
                    <p>Cheers,</p>
                    <p>The iDove Team</p>
                </td>
            </tr>
        </tbody>
    </table>
</td>
@endsection
