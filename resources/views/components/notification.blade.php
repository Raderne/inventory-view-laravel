@props(['notification'])

<div class="flex items-center justify-between space-x-6">
    <span>
        {{ $notification->product->name }}
    </span>
    <div class="space-x-4">
        <span>
            {{ $notification->quantity_changed }} {{ $notification->type }}ed
        </span>
        <i class='bx bx-check-circle {{ $notification->isRead ? "text-green-500": "text-red-500" }}'></i>
    </div>
</div>