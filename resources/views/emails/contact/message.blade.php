@component('mail::message')
# New Contact Message

Hello {{ $data['name'] }}, you have received a new message from your website contact form.

@component('mail::panel')
**📁 Contact Detail**  

**Name:** {{ $data['name'] }}  
**Email:** {{ $data['email'] }}  
**Subject:** {{ $data['subject'] ?? '—' }}
@endcomponent

**Message**

> {!! nl2br(e($data['message'])) !!}

---

To complete your contact submission, please confirm by clicking the button below.

<div style="text-align: center; margin-top: 24px;">
@component('mail::button', ['url' => 'https://yubin.team2lesgo.site/', 'color' => 'primary'])
Confirm
@endcomponent
</div>
@endcomponent
