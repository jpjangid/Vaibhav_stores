@if ($enquiry)

    @if ($enquiry->status == 'pending')
        <div class="alert alert-warning">Your complaint #{{$enquiry->ticket_no}} is in pending state.</div>
    @else
        <div class="alert alert-success">Your complaint #{{$enquiry->ticket_no}} has been resolved.</div>
    @endif


    <div class="alert alert-light">
        <div style="font-size: 16px;color: #3c3c3c;">Your complaint #{{$enquiry->ticket_no}} details:</div>
        <?php echo nl2br($enquiry->enquiry_message); ?>
    </div>

@else
    <div class="alert alert-warning">Not found any complaint with entered ticket number.</div>
@endif


