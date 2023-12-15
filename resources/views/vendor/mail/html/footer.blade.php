@props(['url'])
<tr>
<td>
<table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="content-cell" align="center">
    <a href="{{ $url }}">
        {{ Illuminate\Mail\Markdown::parse($slot) }}
    </a>
</td>
</tr>
</table>
</td>
</tr>
