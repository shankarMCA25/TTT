<?php 
function mail_func($name,$code,$hash) { 
return <<<MAIL

<html>
<style type=text/css>
    #bodyCell,
    #bodyTable,
    body {
        height: 100%!important;
        margin: 0;
        padding: 0;
        width: 100%!important
    }
    table {
        border-collapse: collapse
    }
    a img,
    img {
        border: 0;
        outline: 0;
        text-decoration: none
    }
    h3{
        margin: 0;
        padding: 0
    }
    p {
        margin: 1em 0
    }
    table,
    td {
        mso-table-lspace: 0;
        mso-table-rspace: 0
    }
    #outlook a {
        padding: 0
    }
    img {
        -ms-interpolation-mode: bicubic
    }
    a,
    blockquote,
    body,
    li,
    p,
    table,
    td {
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%
    }
    .flexibleContainerCell {
        padding-top: 20px;
        padding-Right: 20px;
        padding-Left: 20px
    }
    .flexibleImage {
        height: auto
    }
    .bottomShim {
        padding-bottom: 20px
    }
    .imageContent,
    .imageContentLast {
        padding-bottom: 20px
    }
    .nestedContainerCell {
        padding-top: 20px;
        padding-Right: 20px;
        padding-Left: 20px
    }
    #bodyTable,
    body {
        background-color: #F5F5F5
    }
    #bodyCell {
        padding-top: 40px;
        padding-bottom: 40px
    }
    #emailBody {
        background-color: #FFF;
        border: 1px solid #DDD;
        border-collapse: separate;
        border-radius: 4px
    }
    h3{
        color: #202020;
        font-family: Helvetica;
        font-size: 20px;
        line-height: 125%;
        text-align: center
    }
    .textContent,
    .textContentLast {
        color: #404040;
        font-family: Helvetica;
        font-size: 14px;
        line-height: 125%;
        text-align: left;
        padding-bottom: 20px
    }
    .textContent a,
    .textContentLast a {
        color: #2C9AB7;
        text-decoration: underline
    }
    .nestedContainer {
        background-color: #E5E5E5;
        border: 1px solid #CCC
    }
    .emailButton {
        background-color: #2C9AB7;
        border-collapse: separate;
        border-radius: 4px
    }
    @media only screen and (max-width: 480px) {
        table[class=flexibleContainer],
        table[id=emailBody] {
            width: 100%!important
        }
        img[class=flexibleImage] {
            height: auto!important;
            width: 100%!important
        }
        table[class=emailButton] {
            width: 100%!important
        }
        td[class=buttonContent] {
            padding: 0!important
        }
        td[class=buttonContent] a {
            padding: 15px!important
        }
        td[class=textContentLast],
        td[class=imageContentLast] {
            padding-top: 20px!important
        }
        td[id=bodyCell] {
            padding-top: 10px!important;
            padding-Right: 10px!important;
            padding-Left: 10px!important
        }
    }
</style>

<body>
    <center>
        <table border=0 cellpadding=0 cellspacing=0 height=100% width=100% id='bodyTable' >
            <tr>
                <td align=center valign=top id='bodyCell'>
                    <table border=0 cellpadding=0 cellspacing=0 width=600 id='emailBody'>
                        <tr>
                            <td align=center valign=top>
                                <table border=0 cellpadding=0 cellspacing=0 width=100%>
                                    <tr>
                                        <td align=center valign=top>
                                            <table border=0 cellpadding=0 cellspacing=0 width=600 class=flexibleContainer>
                                                <tr>
                                                    <td align=center align=top width=600 class="flexibleContainerCell bottomShim">
                                                        <table border=0 cellpadding=0 cellspacing=0 width=100% class=nestedContainer>
                                                            <tr>
                                                                <td align=center valign=top class=nestedContainerCell>
                                                                    <table border=0 cellpadding=0 cellspacing=0 width=100%>
                                                                        <tr>
                                                                            <td valign=top class=imageContent align=center>
                                                                                <img src="" width=300 class=flexibleImage style=max-width:520px;max-height:150px>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align=center valign=top class=textContent>
                                                                                <h3>Forget your password? Let's get you a new one.</h3>
                                                                                <br>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align=left valign=top class=textContent>Dear $name,
                                                                                <p align=justify>You recently requested a password reset for your FurbStreet ID. To complete the process, click the Button below.</p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align=center valign=top class=bottomShim>
                                                                                <table border=0 cellpadding=0 cellspacing=0>
                                                                                    <tr>
                                                                                        <td align=center valign=middle class=textContent>
                                                                                            <h3>$code</h3>
                                                                                            <p align=justify>(Please copy the above code and click the button below)</p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align=center valign=top class=bottomShim>
                                                                                <table border=0 cellpadding=0 cellspacing=0 width=260 class=emailButton>
                                                                                    <tr>
                                                                                        <td align=center valign=middle style="color: #FFF; font-family: Helvetica;font-size: 18px; font-weight: 700; line-height: 100%; padding: 15px; text-align: center; display: block; text-decoration: none"><a href=images/reset.png" /></a></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align=left valign=top class=textContent>
                                                                                <p align=justify>If the <strong>Reset Your Password</strong> is not working, please enter the below URL and follow the instructions.</p>
                                                                                <p><a href=new_pwd.php>http://furbstreet.com/code.php</a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>
MAIL;
} 
?>