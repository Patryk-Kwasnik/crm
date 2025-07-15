
import { Calendar } from '@fullcalendar/core';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import bootstrap5Plugin from '@fullcalendar/bootstrap5';

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    if (calendarEl) {
        const calendar = new Calendar(calendarEl, {
            plugins: [bootstrap5Plugin, timeGridPlugin, interactionPlugin],
            themeSystem: 'bootstrap5',
            initialView: 'timeGridDay',
            initialDate: new Date(),
            headerToolbar: false,
            allDaySlot: false,
            events: '/API/tasks/events',
            height: 'auto',
            locale: 'pl',
            slotMinTime: '08:00:00',
            slotMaxTime: '18:00:00',
            slotDuration: '00:30:00',
        });
        calendar.render();
    }
});
