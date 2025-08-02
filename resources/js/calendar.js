
import { Calendar } from '@fullcalendar/core';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import bootstrap5Plugin from '@fullcalendar/bootstrap5';
import listPlugin from '@fullcalendar/list';
document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    if (calendarEl) {
        const calendar = new Calendar(calendarEl, {
            plugins: [bootstrap5Plugin, timeGridPlugin, interactionPlugin, listPlugin ],
            themeSystem: 'standard',
            initialView: 'listWeek',
            initialDate: new Date(),
            headerToolbar: false,
            allDaySlot: false,
            events: '/API/tasks/events',
            height: 'auto',
            locale: 'pl',
            slotMinTime: '08:00:00',
            slotMaxTime: '18:00:00',
            slotDuration: '00:30:00',
            editable:false,
            droppable:false
        });
        calendar.render();
    }
});
