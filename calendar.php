<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Calendar - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
    padding-top: 70px;
}
/**** FULL CALENDAR ****/

/* Header
------------------------------------------------------------------------*/
 .fc-header td {
    white-space: nowrap;
}
.fc-header-left {
    width: 25%;
    text-align: left;
}
.fc-header-center {
    text-align: center;
}
.fc-header-right {
    width: 25%;
    text-align: right;
}
.fc-header-title {
    display: inline-block;
    vertical-align: top;
}
.fc-header-title h2 {
    margin-top: 0;
    white-space: nowrap;
}
.fc .fc-header-space {
    padding-left: 10px;
}
.fc-header .fc-button {
    margin-bottom: 1em;
    vertical-align: top;
}
/* buttons edges butting together */
 .fc-header .fc-button {
    margin-right: -1px;
}
.fc-header .fc-corner-right,
/* non-theme */
 .fc-header .ui-corner-right {
    /* theme */
    margin-right: 0;
    /* back to normal */
}
/* button layering (for border precedence) */
 .fc-header .fc-state-hover, .fc-header .ui-state-hover {
    z-index: 2;
}
.fc-header .fc-state-down {
    z-index: 3;
}
.fc-header .fc-state-active, .fc-header .ui-state-active {
    z-index: 4;
}
/* Content
------------------------------------------------------------------------*/
 .fc-content {
    clear: both;
}
.fc-view {
    width: 100%;
    /* needed for view switching (when view is absolute) */
    overflow: hidden;
}
/* Cell Styles
------------------------------------------------------------------------*/
 .fc-widget-header,
/* <th>, usually */
 .fc-widget-content {
    /* <td>, usually */
    border: 1px solid #ddd;
}
.fc-state-highlight {
    /* <td> today cell */
    /* TODO: add .fc-today to <th> */
    background: #fcf8e3;
}
.fc-cell-overlay {
    /* semi-transparent rectangle while dragging */
    background: #bce8f1;
    opacity: .3;
    filter: alpha(opacity=30);
    /* for IE */
}
/* Buttons
------------------------------------------------------------------------*/
 .fc-button {
    position: relative;
    display: inline-block;
    padding: 0 .6em;
    overflow: hidden;
    height: 1.9em;
    line-height: 1.9em;
    white-space: nowrap;
    cursor: pointer;
}
.fc-state-default {
    /* non-theme */
    border: 1px solid;
}
.fc-state-default.fc-corner-left {
    /* non-theme */
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}
.fc-state-default.fc-corner-right {
    /* non-theme */
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}
/*
    Our default prev/next buttons use HTML entities like ‹ › « »
	and we'll try to make them look good cross-browser.
*/
 .fc-text-arrow {
    margin: 0 .1em;
    font-size: 2em;
    font-family:"Courier New", Courier, monospace;
    vertical-align: baseline;
    /* for IE7 */
}
.fc-button-prev .fc-text-arrow, .fc-button-next .fc-text-arrow {
    /* for ‹ › */
    font-weight: bold;
}
/* icon (for jquery ui) */
 .fc-button .fc-icon-wrap {
    position: relative;
    float: left;
    top: 50%;
}
.fc-button .ui-icon {
    position: relative;
    float: left;
    margin-top: -50%;
    *margin-top: 0;
    *top: -50%;
}
/*
  button states
  borrowed from twitter bootstrap (http://twitter.github.com/bootstrap/)
*/
 .fc-state-default {
    background-color: #f5f5f5;
    background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
    background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
    background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
    background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
    background-repeat: repeat-x;
    border-color: #e6e6e6 #e6e6e6 #bfbfbf;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    color: #333;
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
}
.fc-state-hover, .fc-state-down, .fc-state-active, .fc-state-disabled {
    color: #333333;
    background-color: #e6e6e6;
}
.fc-state-hover {
    color: #333333;
    text-decoration: none;
    background-position: 0 -15px;
    -webkit-transition: background-position 0.1s linear;
    -moz-transition: background-position 0.1s linear;
    -o-transition: background-position 0.1s linear;
    transition: background-position 0.1s linear;
}
.fc-state-down, .fc-state-active {
    background-color: #cccccc;
    background-image: none;
    outline: 0;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
}
.fc-state-disabled {
    cursor: default;
    background-image: none;
    opacity: 0.65;
    filter: alpha(opacity=65);
    box-shadow: none;
}
/* Global Event Styles
------------------------------------------------------------------------*/
 .fc-event {
    border: 1px solid #3a87ad;
    /* default BORDER color */
    background-color: #3a87ad;
    /* default BACKGROUND color */
    color: #fff;
    /* default TEXT color */
    font-size: .85em;
    cursor: default;
}
a.fc-event {
    text-decoration: none;
}
a.fc-event, .fc-event-draggable {
    cursor: pointer;
}
.fc-rtl .fc-event {
    text-align: right;
}
.fc-event-inner {
    width: 100%;
    height: 100%;
    overflow: hidden;
}
.fc-event-time, .fc-event-title {
    padding: 0 1px;
}
.fc .ui-resizable-handle {
    display: block;
    position: absolute;
    z-index: 99999;
    overflow: hidden;
    /* hacky spaces (IE6/7) */
    font-size: 300%;
    /* */
    line-height: 50%;
    /* */
}
/* Horizontal Events
------------------------------------------------------------------------*/
 .fc-event-hori {
    border-width: 1px 0;
    margin-bottom: 1px;
}
.fc-ltr .fc-event-hori.fc-event-start, .fc-rtl .fc-event-hori.fc-event-end {
    border-left-width: 1px;
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
}
.fc-ltr .fc-event-hori.fc-event-end, .fc-rtl .fc-event-hori.fc-event-start {
    border-right-width: 1px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
}
/* resizable */
 .fc-event-hori .ui-resizable-e {
    top: 0 !important;
    /* importants override pre jquery ui 1.7 styles */
    right: -3px !important;
    width: 7px !important;
    height: 100% !important;
    cursor: e-resize;
}
.fc-event-hori .ui-resizable-w {
    top: 0 !important;
    left: -3px !important;
    width: 7px !important;
    height: 100% !important;
    cursor: w-resize;
}
.fc-event-hori .ui-resizable-handle {
    _padding-bottom: 14px;
    /* IE6 had 0 height */
}
/* Reusable Separate-border Table
------------------------------------------------------------*/
 table.fc-border-separate {
    border-collapse: separate;
}
.fc-border-separate th, .fc-border-separate td {
    border-width: 1px 0 0 1px;
}
.fc-border-separate th.fc-last, .fc-border-separate td.fc-last {
    border-right-width: 1px;
}
.fc-border-separate tr.fc-last th, .fc-border-separate tr.fc-last td {
    border-bottom-width: 1px;
}
.fc-border-separate tbody tr.fc-first td, .fc-border-separate tbody tr.fc-first th {
    border-top-width: 0;
}
/* Month View, Basic Week View, Basic Day View
------------------------------------------------------------------------*/
 .fc-grid th {
    text-align: center;
}
.fc .fc-week-number {
    width: 22px;
    text-align: center;
}
.fc .fc-week-number div {
    padding: 0 2px;
}
.fc-grid .fc-day-number {
    float: right;
    padding: 0 2px;
}
.fc-grid .fc-other-month .fc-day-number {
    opacity: 0.3;
    filter: alpha(opacity=30);
    /* for IE */
    /* opacity with small font can sometimes look too faded
	   might want to set the 'color' property instead
	   making day-numbers bold also fixes the problem */
}
.fc-grid .fc-day-content {
    clear: both;
    padding: 2px 2px 1px;
    /* distance between events and day edges */
}
/* event styles */
 .fc-grid .fc-event-time {
    font-weight: bold;
}
/* right-to-left */
 .fc-rtl .fc-grid .fc-day-number {
    float: left;
}
.fc-rtl .fc-grid .fc-event-time {
    float: right;
}
/* Agenda Week View, Agenda Day View
------------------------------------------------------------------------*/
 .fc-agenda table {
    border-collapse: separate;
}
.fc-agenda-days th {
    text-align: center;
}
.fc-agenda .fc-agenda-axis {
    width: 50px;
    padding: 0 4px;
    vertical-align: middle;
    text-align: right;
    white-space: nowrap;
    font-weight: normal;
}
.fc-agenda .fc-week-number {
    font-weight: bold;
}
.fc-agenda .fc-day-content {
    padding: 2px 2px 1px;
}
/* make axis border take precedence */
 .fc-agenda-days .fc-agenda-axis {
    border-right-width: 1px;
}
.fc-agenda-days .fc-col0 {
    border-left-width: 0;
}
/* all-day area */
 .fc-agenda-allday th {
    border-width: 0 1px;
}
.fc-agenda-allday .fc-day-content {
    min-height: 34px;
    /* TODO: doesnt work well in quirksmode */
    _height: 34px;
}
/* divider (between all-day and slots) */
 .fc-agenda-divider-inner {
    height: 2px;
    overflow: hidden;
}
.fc-widget-header .fc-agenda-divider-inner {
    background: #eee;
}
/* slot rows */
 .fc-agenda-slots th {
    border-width: 1px 1px 0;
}
.fc-agenda-slots td {
    border-width: 1px 0 0;
    background: none;
}
.fc-agenda-slots td div {
    height: 20px;
}
.fc-agenda-slots tr.fc-slot0 th, .fc-agenda-slots tr.fc-slot0 td {
    border-top-width: 0;
}
.fc-agenda-slots tr.fc-minor th, .fc-agenda-slots tr.fc-minor td {
    border-top-style: dotted;
}
.fc-agenda-slots tr.fc-minor th.ui-widget-header {
    *border-top-style: solid;
    /* doesn't work with background in IE6/7 */
}
/* Vertical Events
------------------------------------------------------------------------*/
 .fc-event-vert {
    border-width: 0 1px;
}
.fc-event-vert.fc-event-start {
    border-top-width: 1px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
.fc-event-vert.fc-event-end {
    border-bottom-width: 1px;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
}
.fc-event-vert .fc-event-time {
    white-space: nowrap;
    font-size: 10px;
}
.fc-event-vert .fc-event-inner {
    position: relative;
    z-index: 2;
}
.fc-event-vert .fc-event-bg {
    /* makes the event lighter w/ a semi-transparent overlay  */
    position: absolute;
    z-index: 1;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #fff;
    opacity: .25;
    filter: alpha(opacity=25);
}
.fc .ui-draggable-dragging .fc-event-bg,
/* TODO: something nicer like .fc-opacity */
 .fc-select-helper .fc-event-bg {
    display: none\9;
    /* for IE6/7/8. nested opacity filters while dragging don't work */
}
/* resizable */
 .fc-event-vert .ui-resizable-s {
    bottom: 0 !important;
    /* importants override pre jquery ui 1.7 styles */
    width: 100% !important;
    height: 8px !important;
    overflow: hidden !important;
    line-height: 8px !important;
    font-size: 11px !important;
    font-family: monospace;
    text-align: center;
    cursor: s-resize;
}
.fc-agenda .ui-resizable-resizing {
    /* TODO: better selector */
    _overflow: hidden;
}
/* CUSTOM */
 body .calendar {
    margin-bottom: 20px;
}
body .calendar .fc-header {
    margin-bottom: 10px;
}
body .calendar .fc-header .fc-button-effect {
    display: none;
}
body .calendar .fc-header .fc-header-left .fc-button, body .calendar .fc-header .fc-header-right .fc-button {
    background: none;
    border: none;
}
body .calendar .fc-header .fc-header-left .fc-button.fc-button-prev, body .calendar .fc-header .fc-header-right .fc-button.fc-button-prev {
    background: center center !important;
    text-indent: -9999px;
    width: 36px;
    height: 24px;
    padding: 0;
    opacity: 0.3;
    filter: alpha(opacity=30);
}
body .calendar .fc-header .fc-header-left .fc-button.fc-button-prev:hover, body .calendar .fc-header .fc-header-right .fc-button.fc-button-prev:hover {
    opacity: 1;
    filter: alpha(opacity=100);
}
body .calendar .fc-header .fc-header-left .fc-button.fc-button-next, body .calendar .fc-header .fc-header-right .fc-button.fc-button-next {
    text-indent: -9999px;
    background: url(../../img/styler/arrow-right.png) center center !important;
    width: 36px;
    height: 24px;
    padding: 0;
    opacity: 0.3;
    filter: alpha(opacity=30);
}
body .calendar .fc-header .fc-header-left .fc-button.fc-button-next:hover, body .calendar .fc-header .fc-header-right .fc-button.fc-button-next:hover {
    opacity: 1;
    filter: alpha(opacity=100);
}
body .calendar .fc-header .fc-header-left .fc-button.fc-state-default, body .calendar .fc-header .fc-header-right .fc-button.fc-state-default {
    box-shadow: none;
    text-shadow: none;
    background: #f5f5f5;
}
body .calendar .fc-header .fc-header-left .fc-button.fc-state-active, body .calendar .fc-header .fc-header-right .fc-button.fc-state-active {
    background: #34495e;
    color: #fff;
    box-shadow: none;
}
body .calendar .fc-header .fc-header-left .fc-button .fc-button-inner, body .calendar .fc-header .fc-header-right .fc-button .fc-button-inner {
    background: none;
    border: none;
    color: #bbb;
    font-weight: 300;
    font-family:'Roboto', Helvetica, sans-serif;
    text-transform: uppercase;
    font-size: 18px;
}
body .calendar .fc-header .fc-header-left .fc-button .fc-button-inner .fc-button-content, body .calendar .fc-header .fc-header-right .fc-button .fc-button-inner .fc-button-content {
    line-height: 48px;
    -webkit-transition: All 0.5s ease;
    -moz-transition: All 0.5s ease;
    -o-transition: All 0.5s ease;
    -ms-transition: All 0.5s ease;
    transition: All 0.5s ease;
}
body .calendar .fc-header .fc-header-left .fc-button:hover .fc-button-inner, body .calendar .fc-header .fc-header-right .fc-button:hover .fc-button-inner {
    color: #333;
}
body .calendar .fc-header .fc-header-left .fc-button.fc-state-active .fc-button-inner, body .calendar .fc-header .fc-header-right .fc-button.fc-state-active .fc-button-inner {
    color: #333;
    font-weight: 400;
}
body .calendar .fc-header .fc-header-title h2 {
    font-family:'Roboto', Helvetica, sans-serif;
}
body .calendar .fc-content .fc-state-highlight {
    background: #f5f5f5;
}
body .calendar .fc-content .fc-event {
    border-radius: 50%;
    width: 50px;
    height: 50px;
    background: #5bc0de;
    border: rgba(0, 0, 0, 0.1) solid 1px;
}
body .calendar .fc-content .fc-view-month table thead th {
    border: none;
}
body .calendar .fc-content .fc-view-month table tbody tr td.fc-widget-content {
    border: #fff solid 2px;
    background: #f5f5f5;
    margin: 3px 3px;
    padding: 10px;
}
body .calendar .fc-content .fc-view-month table tbody tr td .fc-day-number {
    font-size: 24px;
    font-weight: 300;
    font-family:'Roboto', Helvetica, sans-serif;
    margin-bottom: 10px;
}
body .calendar .fc-content .fc-view-month .fc-event-skin {
    background: #2abf9e;
    border: none;
    border-radius: 0;
    line-height: 1.3;
}
body .calendar .fc-content .fc-view-month .fc-event-skin .fc-event-inner {
    margin: 3px;
    width: auto;
}
body .calendar .fc-content .fc-view-month .fc-event-skin .fc-event-time {
    font-weight: 600;
    margin-left: 3px;
    text-transform: uppercase;
}
body .calendar .fc-content .fc-view-month .fc-event-skin .fc-event-title {
    margin: 3px;
    line-height: 1;
}
body .calendar .fc-content .fc-view-agendaWeek table.fc-agenda-days thead th {
    border: none;
}
body .calendar .fc-content .fc-view-agendaWeek table.fc-agenda-days tbody tr td {
    border: none;
}
body .calendar .fc-content .fc-view-agendaWeek table.fc-agenda-days tbody tr td.fc-widget-content {
    border: #fff solid 2px;
    background: #f5f5f5;
    margin: 3px 3px;
    padding: 10px;
}
body .calendar .fc-content .fc-view-agendaWeek table.fc-agenda-days tbody tr td.fc-state-highlight {
    background: #ddd;
}
body .calendar .fc-content .fc-view-agendaWeek table.fc-agenda-allday thead th {
    border: none !important;
}
body .calendar .fc-content .fc-view-agendaWeek table.fc-agenda-slots tr th.fc-agenda-axis {
    border: none !important;
    background: #fff;
}
body .calendar .fc-content .fc-view-agendaWeek table.fc-agenda-slots tr td.fc-widget-content {
    background: none;
    border: #fff solid 2px;
    border-bottom-width: 1px;
}
body .calendar .fc-content .fc-view-agendaWeek table.fc-agenda-slots tr.fc-minor {
    border-top: none;
}
body .calendar .fc-content .fc-view-agendaWeek table.fc-agenda-slots tr.fc-minor td.fc-widget-content {
    border-top: none;
    border-bottom-width: 2px;
}
body .calendar .fc-content .fc-border-separate tr.fc-last th, body .calendar .fc-content .fc-border-separate tr.fc-last td {
    border: none;
}
/*!
 * FullCalendar v1.6.1 Stylesheet
 * Docs & License: http://arshaw.com/fullcalendar/
 * (c) 2013 Adam Shaw
 */
 .fc {
    direction: ltr;
    text-align: left;
}
.fc table {
    border-collapse: collapse;
    border-spacing: 0;
}
html .fc, .fc table {
    font-size: 1em;
}
.fc td, .fc th {
    padding: 0;
    vertical-align: top;
}
/**** ANIMATIONS ****/
 @charset"UTF-8";

/*!
Animate.css - http://daneden.me/animate
Licensed under the MIT license

Copyright (c) 2013 Daniel Eden

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

/* Custom Background */
 .bg {
    background-image: url(http://www.ecampusnews.com/wp-content/blogs.dir/3/files/2011/03/students633.jpg);
    background-size: 100% 100%;
    content:"";
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    position: absolute;
    z-index: -1;
    -webkit-filter: blur(3px);
    -moz-filter: blur(3px);
    -o-filter: blur(3px);
    -ms-filter: blur(3px);
    filter: blur(3px);
}
/* Default Aniamtions */
 .animated {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
.animated.hinge {
    -webkit-animation-duration: 2s;
    animation-duration: 2s;
}
/* Custom Delay Animations */
 .animated-sm {
    -webkit-animation-delay: .25s;
    animation-delay: .25s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
.animated-md {
    -webkit-animation-delay: .5s;
    animation-delay: .5s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
.animated-lg {
    -webkit-animation-delay: .75s;
    animation-delay: .75s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
.animated-xl {
    -webkit-animation-delay: 1s;
    animation-delay: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
.animated-xxl {
    -webkit-animation-delay: 1.25s;
    animation-delay: 1.25s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
.animated-xxxl {
    -webkit-animation-delay: 1.60s;
    animation-delay: 1.60s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
.animated-xxxxl {
    -webkit-animation-delay: 1.75s;
    animation-delay: 1.75s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
/* Custom Duration Animations */
 .animated-long {
    -webkit-animation-duration: 1.5s;
    animation-duration: 1.5s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
.animated-longer {
    -webkit-animation-duration: 2s;
    animation-duration: 2s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
.animated-longest {
    -webkit-animation-duration: 2.5s;
    animation-duration: 2.5s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
@-webkit-keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
    40% {
        -webkit-transform: translateY(-30px);
        transform: translateY(-30px);
    }
    60% {
        -webkit-transform: translateY(-15px);
        transform: translateY(-15px);
    }
}
@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
    40% {
        -webkit-transform: translateY(-30px);
        -ms-transform: translateY(-30px);
        transform: translateY(-30px);
    }
    60% {
        -webkit-transform: translateY(-15px);
        -ms-transform: translateY(-15px);
        transform: translateY(-15px);
    }
}
.bounce {
    -webkit-animation-name: bounce;
    animation-name: bounce;
}
@-webkit-keyframes flash {
    0%, 50%, 100% {
        opacity: 1;
    }
    25%, 75% {
        opacity: 0;
    }
}
@keyframes flash {
    0%, 50%, 100% {
        opacity: 1;
    }
    25%, 75% {
        opacity: 0;
    }
}
.flash {
    -webkit-animation-name: flassh;
    animation-name: flash;
}
/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */
 @-webkit-keyframes pulse {
    0% {
        -webkit-transform: scale(1);
        transform: scale(1);
    }
    50% {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
    100% {
        -webkit-transform: scale(1);
        transform: scale(1);
    }
}
@keyframes pulse {
    0% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
    }
    50% {
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1.1);
    }
    100% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
    }
}
.pulse {
    -webkit-animation-name: pulse;
    animation-name: pulse;
}
@-webkit-keyframes shake {
    0%, 100% {
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
    10%, 30%, 50%, 70%, 90% {
        -webkit-transform: translateX(-10px);
        transform: translateX(-10px);
    }
    20%, 40%, 60%, 80% {
        -webkit-transform: translateX(10px);
        transform: translateX(10px);
    }
}
@keyframes shake {
    0%, 100% {
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
    10%, 30%, 50%, 70%, 90% {
        -webkit-transform: translateX(-10px);
        -ms-transform: translateX(-10px);
        transform: translateX(-10px);
    }
    20%, 40%, 60%, 80% {
        -webkit-transform: translateX(10px);
        -ms-transform: translateX(10px);
        transform: translateX(10px);
    }
}
.shake {
    -webkit-animation-name: shake;
    animation-name: shake;
}
@-webkit-keyframes swing {
    20% {
        -webkit-transform: rotate(15deg);
        transform: rotate(15deg);
    }
    40% {
        -webkit-transform: rotate(-10deg);
        transform: rotate(-10deg);
    }
    60% {
        -webkit-transform: rotate(5deg);
        transform: rotate(5deg);
    }
    80% {
        -webkit-transform: rotate(-5deg);
        transform: rotate(-5deg);
    }
    100% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
}
@keyframes swing {
    20% {
        -webkit-transform: rotate(15deg);
        -ms-transform: rotate(15deg);
        transform: rotate(15deg);
    }
    40% {
        -webkit-transform: rotate(-10deg);
        -ms-transform: rotate(-10deg);
        transform: rotate(-10deg);
    }
    60% {
        -webkit-transform: rotate(5deg);
        -ms-transform: rotate(5deg);
        transform: rotate(5deg);
    }
    80% {
        -webkit-transform: rotate(-5deg);
        -ms-transform: rotate(-5deg);
        transform: rotate(-5deg);
    }
    100% {
        -webkit-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        transform: rotate(0deg);
    }
}
.swing {
    -webkit-transform-origin: top center;
    -ms-transform-origin: top center;
    transform-origin: top center;
    -webkit-animation-name: swing;
    animation-name: swing;
}
@-webkit-keyframes tada {
    0% {
        -webkit-transform: scale(1);
        transform: scale(1);
    }
    10%, 20% {
        -webkit-transform: scale(0.9) rotate(-3deg);
        transform: scale(0.9) rotate(-3deg);
    }
    30%, 50%, 70%, 90% {
        -webkit-transform: scale(1.1) rotate(3deg);
        transform: scale(1.1) rotate(3deg);
    }
    40%, 60%, 80% {
        -webkit-transform: scale(1.1) rotate(-3deg);
        transform: scale(1.1) rotate(-3deg);
    }
    100% {
        -webkit-transform: scale(1) rotate(0);
        transform: scale(1) rotate(0);
    }
}
@keyframes tada {
    0% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
    }
    10%, 20% {
        -webkit-transform: scale(0.9) rotate(-3deg);
        -ms-transform: scale(0.9) rotate(-3deg);
        transform: scale(0.9) rotate(-3deg);
    }
    30%, 50%, 70%, 90% {
        -webkit-transform: scale(1.1) rotate(3deg);
        -ms-transform: scale(1.1) rotate(3deg);
        transform: scale(1.1) rotate(3deg);
    }
    40%, 60%, 80% {
        -webkit-transform: scale(1.1) rotate(-3deg);
        -ms-transform: scale(1.1) rotate(-3deg);
        transform: scale(1.1) rotate(-3deg);
    }
    100% {
        -webkit-transform: scale(1) rotate(0);
        -ms-transform: scale(1) rotate(0);
        transform: scale(1) rotate(0);
    }
}
.tada {
    -webkit-animation-name: tada;
    animation-name: tada;
}
/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */
 @-webkit-keyframes wobble {
    0% {
        -webkit-transform: translateX(0%);
        transform: translateX(0%);
    }
    15% {
        -webkit-transform: translateX(-25%) rotate(-5deg);
        transform: translateX(-25%) rotate(-5deg);
    }
    30% {
        -webkit-transform: translateX(20%) rotate(3deg);
        transform: translateX(20%) rotate(3deg);
    }
    45% {
        -webkit-transform: translateX(-15%) rotate(-3deg);
        transform: translateX(-15%) rotate(-3deg);
    }
    60% {
        -webkit-transform: translateX(10%) rotate(2deg);
        transform: translateX(10%) rotate(2deg);
    }
    75% {
        -webkit-transform: translateX(-5%) rotate(-1deg);
        transform: translateX(-5%) rotate(-1deg);
    }
    100% {
        -webkit-transform: translateX(0%);
        transform: translateX(0%);
    }
}
@keyframes wobble {
    0% {
        -webkit-transform: translateX(0%);
        -ms-transform: translateX(0%);
        transform: translateX(0%);
    }
    15% {
        -webkit-transform: translateX(-25%) rotate(-5deg);
        -ms-transform: translateX(-25%) rotate(-5deg);
        transform: translateX(-25%) rotate(-5deg);
    }
    30% {
        -webkit-transform: translateX(20%) rotate(3deg);
        -ms-transform: translateX(20%) rotate(3deg);
        transform: translateX(20%) rotate(3deg);
    }
    45% {
        -webkit-transform: translateX(-15%) rotate(-3deg);
        -ms-transform: translateX(-15%) rotate(-3deg);
        transform: translateX(-15%) rotate(-3deg);
    }
    60% {
        -webkit-transform: translateX(10%) rotate(2deg);
        -ms-transform: translateX(10%) rotate(2deg);
        transform: translateX(10%) rotate(2deg);
    }
    75% {
        -webkit-transform: translateX(-5%) rotate(-1deg);
        -ms-transform: translateX(-5%) rotate(-1deg);
        transform: translateX(-5%) rotate(-1deg);
    }
    100% {
        -webkit-transform: translateX(0%);
        -ms-transform: translateX(0%);
        transform: translateX(0%);
    }
}
.wobble {
    -webkit-animation-name: wobble;
    animation-name: wobble;
}
@-webkit-keyframes bounceIn {
    0% {
        opacity: 0;
        -webkit-transform: scale(.3);
        transform: scale(.3);
    }
    50% {
        opacity: 1;
        -webkit-transform: scale(1.05);
        transform: scale(1.05);
    }
    70% {
        -webkit-transform: scale(.9);
        transform: scale(.9);
    }
    100% {
        -webkit-transform: scale(1);
        transform: scale(1);
    }
}
@keyframes bounceIn {
    0% {
        opacity: 0;
        -webkit-transform: scale(.3);
        -ms-transform: scale(.3);
        transform: scale(.3);
    }
    50% {
        opacity: 1;
        -webkit-transform: scale(1.05);
        -ms-transform: scale(1.05);
        transform: scale(1.05);
    }
    70% {
        -webkit-transform: scale(.9);
        -ms-transform: scale(.9);
        transform: scale(.9);
    }
    100% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
    }
}
.bounceIn {
    -webkit-animation-name: bounceIn;
    animation-name: bounceIn;
}
@-webkit-keyframes bounceInDown {
    0% {
        opacity: 0;
        -webkit-transform: translateY(-2000px);
        transform: translateY(-2000px);
    }
    60% {
        opacity: 1;
        -webkit-transform: translateY(30px);
        transform: translateY(30px);
    }
    80% {
        -webkit-transform: translateY(-10px);
        transform: translateY(-10px);
    }
    100% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
}
@keyframes bounceInDown {
    0% {
        opacity: 0;
        -webkit-transform: translateY(-2000px);
        -ms-transform: translateY(-2000px);
        transform: translateY(-2000px);
    }
    60% {
        opacity: 1;
        -webkit-transform: translateY(30px);
        -ms-transform: translateY(30px);
        transform: translateY(30px);
    }
    80% {
        -webkit-transform: translateY(-10px);
        -ms-transform: translateY(-10px);
        transform: translateY(-10px);
    }
    100% {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
}
.bounceInDown {
    -webkit-animation-name: bounceInDown;
    animation-name: bounceInDown;
}
@-webkit-keyframes bounceInLeft {
    0% {
        opacity: 0;
        -webkit-transform: translateX(-2000px);
        transform: translateX(-2000px);
    }
    60% {
        opacity: 1;
        -webkit-transform: translateX(30px);
        transform: translateX(30px);
    }
    80% {
        -webkit-transform: translateX(-10px);
        transform: translateX(-10px);
    }
    100% {
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
}
@keyframes bounceInLeft {
    0% {
        opacity: 0;
        -webkit-transform: translateX(-2000px);
        -ms-transform: translateX(-2000px);
        transform: translateX(-2000px);
    }
    60% {
        opacity: 1;
        -webkit-transform: translateX(30px);
        -ms-transform: translateX(30px);
        transform: translateX(30px);
    }
    80% {
        -webkit-transform: translateX(-10px);
        -ms-transform: translateX(-10px);
        transform: translateX(-10px);
    }
    100% {
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
}
.bounceInLeft {
    -webkit-animation-name: bounceInLeft;
    animation-name: bounceInLeft;
}
@-webkit-keyframes bounceInRight {
    0% {
        opacity: 0;
        -webkit-transform: translateX(2000px);
        transform: translateX(2000px);
    }
    60% {
        opacity: 1;
        -webkit-transform: translateX(-30px);
        transform: translateX(-30px);
    }
    80% {
        -webkit-transform: translateX(10px);
        transform: translateX(10px);
    }
    100% {
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
}
@keyframes bounceInRight {
    0% {
        opacity: 0;
        -webkit-transform: translateX(2000px);
        -ms-transform: translateX(2000px);
        transform: translateX(2000px);
    }
    60% {
        opacity: 1;
        -webkit-transform: translateX(-30px);
        -ms-transform: translateX(-30px);
        transform: translateX(-30px);
    }
    80% {
        -webkit-transform: translateX(10px);
        -ms-transform: translateX(10px);
        transform: translateX(10px);
    }
    100% {
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
}
.bounceInRight {
    -webkit-animation-name: bounceInRight;
    animation-name: bounceInRight;
}
@-webkit-keyframes bounceInUp {
    0% {
        opacity: 0;
        -webkit-transform: translateY(2000px);
        transform: translateY(2000px);
    }
    60% {
        opacity: 1;
        -webkit-transform: translateY(-30px);
        transform: translateY(-30px);
    }
    80% {
        -webkit-transform: translateY(10px);
        transform: translateY(10px);
    }
    100% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
}
@keyframes bounceInUp {
    0% {
        opacity: 0;
        -webkit-transform: translateY(2000px);
        -ms-transform: translateY(2000px);
        transform: translateY(2000px);
    }
    60% {
        opacity: 1;
        -webkit-transform: translateY(-30px);
        -ms-transform: translateY(-30px);
        transform: translateY(-30px);
    }
    80% {
        -webkit-transform: translateY(10px);
        -ms-transform: translateY(10px);
        transform: translateY(10px);
    }
    100% {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
}
.bounceInUp {
    -webkit-animation-name: bounceInUp;
    animation-name: bounceInUp;
}
@-webkit-keyframes bounceOut {
    0% {
        -webkit-transform: scale(1);
        transform: scale(1);
    }
    25% {
        -webkit-transform: scale(.95);
        transform: scale(.95);
    }
    50% {
        opacity: 1;
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
    100% {
        opacity: 0;
        -webkit-transform: scale(.3);
        transform: scale(.3);
    }
}
@keyframes bounceOut {
    0% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
    }
    25% {
        -webkit-transform: scale(.95);
        -ms-transform: scale(.95);
        transform: scale(.95);
    }
    50% {
        opacity: 1;
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1.1);
    }
    100% {
        opacity: 0;
        -webkit-transform: scale(.3);
        -ms-transform: scale(.3);
        transform: scale(.3);
    }
}
.bounceOut {
    -webkit-animation-name: bounceOut;
    animation-name: bounceOut;
}
@-webkit-keyframes bounceOutDown {
    0% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
    20% {
        opacity: 1;
        -webkit-transform: translateY(-20px);
        transform: translateY(-20px);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateY(2000px);
        transform: translateY(2000px);
    }
}
@keyframes bounceOutDown {
    0% {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
    20% {
        opacity: 1;
        -webkit-transform: translateY(-20px);
        -ms-transform: translateY(-20px);
        transform: translateY(-20px);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateY(2000px);
        -ms-transform: translateY(2000px);
        transform: translateY(2000px);
    }
}
.bounceOutDown {
    -webkit-animation-name: bounceOutDown;
    animation-name: bounceOutDown;
}
@-webkit-keyframes bounceOutLeft {
    0% {
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
    20% {
        opacity: 1;
        -webkit-transform: translateX(20px);
        transform: translateX(20px);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(-2000px);
        transform: translateX(-2000px);
    }
}
@keyframes bounceOutLeft {
    0% {
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
    20% {
        opacity: 1;
        -webkit-transform: translateX(20px);
        -ms-transform: translateX(20px);
        transform: translateX(20px);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(-2000px);
        -ms-transform: translateX(-2000px);
        transform: translateX(-2000px);
    }
}
.bounceOutLeft {
    -webkit-animation-name: bounceOutLeft;
    animation-name: bounceOutLeft;
}
@-webkit-keyframes bounceOutRight {
    0% {
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
    20% {
        opacity: 1;
        -webkit-transform: translateX(-20px);
        transform: translateX(-20px);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(2000px);
        transform: translateX(2000px);
    }
}
@keyframes bounceOutRight {
    0% {
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
    20% {
        opacity: 1;
        -webkit-transform: translateX(-20px);
        -ms-transform: translateX(-20px);
        transform: translateX(-20px);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(2000px);
        -ms-transform: translateX(2000px);
        transform: translateX(2000px);
    }
}
.bounceOutRight {
    -webkit-animation-name: bounceOutRight;
    animation-name: bounceOutRight;
}
@-webkit-keyframes bounceOutUp {
    0% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
    20% {
        opacity: 1;
        -webkit-transform: translateY(20px);
        transform: translateY(20px);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateY(-2000px);
        transform: translateY(-2000px);
    }
}
@keyframes bounceOutUp {
    0% {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
    20% {
        opacity: 1;
        -webkit-transform: translateY(20px);
        -ms-transform: translateY(20px);
        transform: translateY(20px);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateY(-2000px);
        -ms-transform: translateY(-2000px);
        transform: translateY(-2000px);
    }
}
.bounceOutUp {
    -webkit-animation-name: bounceOutUp;
    animation-name: bounceOutUp;
}
@-webkit-keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
.fadeIn {
    -webkit-animation-name: fadeIn;
    animation-name: fadeIn;
}
@-webkit-keyframes fadeInDown {
    0% {
        opacity: 0;
        -webkit-transform: translateY(-20px);
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
}
@keyframes fadeInDown {
    0% {
        opacity: 0;
        -webkit-transform: translateY(-20px);
        -ms-transform: translateY(-20px);
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
}
.fadeInDown {
    -webkit-animation-name: fadeInDown;
    animation-name: fadeInDown;
}
@-webkit-keyframes fadeInDownBig {
    0% {
        opacity: 0;
        -webkit-transform: translateY(-2000px);
        transform: translateY(-2000px);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
}
@keyframes fadeInDownBig {
    0% {
        opacity: 0;
        -webkit-transform: translateY(-2000px);
        -ms-transform: translateY(-2000px);
        transform: translateY(-2000px);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
}
.fadeInDownBig {
    -webkit-animation-name: fadeInDownBig;
    animation-name: fadeInDownBig;
}
@-webkit-keyframes fadeInLeft {
    0% {
        opacity: 0;
        -webkit-transform: translateX(-20px);
        transform: translateX(-20px);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
}
@keyframes fadeInLeft {
    0% {
        opacity: 0;
        -webkit-transform: translateX(-20px);
        -ms-transform: translateX(-20px);
        transform: translateX(-20px);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
}
.fadeInLeft {
    -webkit-animation-name: fadeInLeft;
    animation-name: fadeInLeft;
}
@-webkit-keyframes fadeInLeftBig {
    0% {
        opacity: 0;
        -webkit-transform: translateX(-2000px);
        transform: translateX(-2000px);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
}
@keyframes fadeInLeftBig {
    0% {
        opacity: 0;
        -webkit-transform: translateX(-2000px);
        -ms-transform: translateX(-2000px);
        transform: translateX(-2000px);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
}
.fadeInLeftBig {
    -webkit-animation-name: fadeInLeftBig;
    animation-name: fadeInLeftBig;
}
@-webkit-keyframes fadeInRight {
    0% {
        opacity: 0;
        -webkit-transform: translateX(20px);
        transform: translateX(20px);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
}
@keyframes fadeInRight {
    0% {
        opacity: 0;
        -webkit-transform: translateX(20px);
        -ms-transform: translateX(20px);
        transform: translateX(20px);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
}
.fadeInRight {
    -webkit-animation-name: fadeInRight;
    animation-name: fadeInRight;
}
@-webkit-keyframes fadeInRightBig {
    0% {
        opacity: 0;
        -webkit-transform: translateX(2000px);
        transform: translateX(2000px);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
}
@keyframes fadeInRightBig {
    0% {
        opacity: 0;
        -webkit-transform: translateX(2000px);
        -ms-transform: translateX(2000px);
        transform: translateX(2000px);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
}
.fadeInRightBig {
    -webkit-animation-name: fadeInRightBig;
    animation-name: fadeInRightBig;
}
@-webkit-keyframes fadeInUp {
    0% {
        opacity: 0;
        -webkit-transform: translateY(20px);
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
}
@keyframes fadeInUp {
    0% {
        opacity: 0;
        -webkit-transform: translateY(20px);
        -ms-transform: translateY(20px);
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
}
.fadeInUp {
    -webkit-animation-name: fadeInUp;
    animation-name: fadeInUp;
}
@-webkit-keyframes fadeInUpBig {
    0% {
        opacity: 0;
        -webkit-transform: translateY(2000px);
        transform: translateY(2000px);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
}
@keyframes fadeInUpBig {
    0% {
        opacity: 0;
        -webkit-transform: translateY(2000px);
        -ms-transform: translateY(2000px);
        transform: translateY(2000px);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
}
.fadeInUpBig {
    -webkit-animation-name: fadeInUpBig;
    animation-name: fadeInUpBig;
}
@-webkit-keyframes fadeOut {
    0% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}
@keyframes fadeOut {
    0% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}
.fadeOut {
    -webkit-animation-name: fadeOut;
    animation-name: fadeOut;
}
@-webkit-keyframes fadeOutDown {
    0% {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateY(20px);
        transform: translateY(20px);
    }
}
@keyframes fadeOutDown {
    0% {
        opacity: 1;
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateY(20px);
        -ms-transform: translateY(20px);
        transform: translateY(20px);
    }
}
.fadeOutDown {
    -webkit-animation-name: fadeOutDown;
    animation-name: fadeOutDown;
}
@-webkit-keyframes fadeOutDownBig {
    0% {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateY(2000px);
        transform: translateY(2000px);
    }
}
@keyframes fadeOutDownBig {
    0% {
        opacity: 1;
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateY(2000px);
        -ms-transform: translateY(2000px);
        transform: translateY(2000px);
    }
}
.fadeOutDownBig {
    -webkit-animation-name: fadeOutDownBig;
    animation-name: fadeOutDownBig;
}
@-webkit-keyframes fadeOutLeft {
    0% {
        opacity: 1;
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(-20px);
        transform: translateX(-20px);
    }
}
@keyframes fadeOutLeft {
    0% {
        opacity: 1;
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(-20px);
        -ms-transform: translateX(-20px);
        transform: translateX(-20px);
    }
}
.fadeOutLeft {
    -webkit-animation-name: fadeOutLeft;
    animation-name: fadeOutLeft;
}
@-webkit-keyframes fadeOutLeftBig {
    0% {
        opacity: 1;
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(-2000px);
        transform: translateX(-2000px);
    }
}
@keyframes fadeOutLeftBig {
    0% {
        opacity: 1;
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(-2000px);
        -ms-transform: translateX(-2000px);
        transform: translateX(-2000px);
    }
}
.fadeOutLeftBig {
    -webkit-animation-name: fadeOutLeftBig;
    animation-name: fadeOutLeftBig;
}
@-webkit-keyframes fadeOutRight {
    0% {
        opacity: 1;
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(20px);
        transform: translateX(20px);
    }
}
@keyframes fadeOutRight {
    0% {
        opacity: 1;
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(20px);
        -ms-transform: translateX(20px);
        transform: translateX(20px);
    }
}
.fadeOutRight {
    -webkit-animation-name: fadeOutRight;
    animation-name: fadeOutRight;
}
@-webkit-keyframes fadeOutRightBig {
    0% {
        opacity: 1;
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(2000px);
        transform: translateX(2000px);
    }
}
@keyframes fadeOutRightBig {
    0% {
        opacity: 1;
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(2000px);
        -ms-transform: translateX(2000px);
        transform: translateX(2000px);
    }
}
.fadeOutRightBig {
    -webkit-animation-name: fadeOutRightBig;
    animation-name: fadeOutRightBig;
}
@-webkit-keyframes fadeOutUp {
    0% {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateY(-20px);
        transform: translateY(-20px);
    }
}
@keyframes fadeOutUp {
    0% {
        opacity: 1;
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateY(-20px);
        -ms-transform: translateY(-20px);
        transform: translateY(-20px);
    }
}
.fadeOutUp {
    -webkit-animation-name: fadeOutUp;
    animation-name: fadeOutUp;
}
@-webkit-keyframes fadeOutUpBig {
    0% {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateY(-2000px);
        transform: translateY(-2000px);
    }
}
@keyframes fadeOutUpBig {
    0% {
        opacity: 1;
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateY(-2000px);
        -ms-transform: translateY(-2000px);
        transform: translateY(-2000px);
    }
}
.fadeOutUpBig {
    -webkit-animation-name: fadeOutUpBig;
    animation-name: fadeOutUpBig;
}
@-webkit-keyframes flip {
    0% {
        -webkit-transform: perspective(400px) translateZ(0) rotateY(0) scale(1);
        transform: perspective(400px) translateZ(0) rotateY(0) scale(1);
        -webkit-animation-timing-function: ease-out;
        animation-timing-function: ease-out;
    }
    40% {
        -webkit-transform: perspective(400px) translateZ(150px) rotateY(170deg) scale(1);
        transform: perspective(400px) translateZ(150px) rotateY(170deg) scale(1);
        -webkit-animation-timing-function: ease-out;
        animation-timing-function: ease-out;
    }
    50% {
        -webkit-transform: perspective(400px) translateZ(150px) rotateY(190deg) scale(1);
        transform: perspective(400px) translateZ(150px) rotateY(190deg) scale(1);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in;
    }
    80% {
        -webkit-transform: perspective(400px) translateZ(0) rotateY(360deg) scale(.95);
        transform: perspective(400px) translateZ(0) rotateY(360deg) scale(.95);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in;
    }
    100% {
        -webkit-transform: perspective(400px) translateZ(0) rotateY(360deg) scale(1);
        transform: perspective(400px) translateZ(0) rotateY(360deg) scale(1);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in;
    }
}
@keyframes flip {
    0% {
        -webkit-transform: perspective(400px) translateZ(0) rotateY(0) scale(1);
        -ms-transform: perspective(400px) translateZ(0) rotateY(0) scale(1);
        transform: perspective(400px) translateZ(0) rotateY(0) scale(1);
        -webkit-animation-timing-function: ease-out;
        animation-timing-function: ease-out;
    }
    40% {
        -webkit-transform: perspective(400px) translateZ(150px) rotateY(170deg) scale(1);
        -ms-transform: perspective(400px) translateZ(150px) rotateY(170deg) scale(1);
        transform: perspective(400px) translateZ(150px) rotateY(170deg) scale(1);
        -webkit-animation-timing-function: ease-out;
        animation-timing-function: ease-out;
    }
    50% {
        -webkit-transform: perspective(400px) translateZ(150px) rotateY(190deg) scale(1);
        -ms-transform: perspective(400px) translateZ(150px) rotateY(190deg) scale(1);
        transform: perspective(400px) translateZ(150px) rotateY(190deg) scale(1);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in;
    }
    80% {
        -webkit-transform: perspective(400px) translateZ(0) rotateY(360deg) scale(.95);
        -ms-transform: perspective(400px) translateZ(0) rotateY(360deg) scale(.95);
        transform: perspective(400px) translateZ(0) rotateY(360deg) scale(.95);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in;
    }
    100% {
        -webkit-transform: perspective(400px) translateZ(0) rotateY(360deg) scale(1);
        -ms-transform: perspective(400px) translateZ(0) rotateY(360deg) scale(1);
        transform: perspective(400px) translateZ(0) rotateY(360deg) scale(1);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in;
    }
}
.animated.flip {
    -webkit-backface-visibility: visible;
    -ms-backface-visibility: visible;
    backface-visibility: visible;
    -webkit-animation-name: flip;
    animation-name: flip;
}
@-webkit-keyframes flipInX {
    0% {
        -webkit-transform: perspective(400px) rotateX(90deg);
        transform: perspective(400px) rotateX(90deg);
        opacity: 0;
    }
    40% {
        -webkit-transform: perspective(400px) rotateX(-10deg);
        transform: perspective(400px) rotateX(-10deg);
    }
    70% {
        -webkit-transform: perspective(400px) rotateX(10deg);
        transform: perspective(400px) rotateX(10deg);
    }
    100% {
        -webkit-transform: perspective(400px) rotateX(0deg);
        transform: perspective(400px) rotateX(0deg);
        opacity: 1;
    }
}
@keyframes flipInX {
    0% {
        -webkit-transform: perspective(400px) rotateX(90deg);
        -ms-transform: perspective(400px) rotateX(90deg);
        transform: perspective(400px) rotateX(90deg);
        opacity: 0;
    }
    40% {
        -webkit-transform: perspective(400px) rotateX(-10deg);
        -ms-transform: perspective(400px) rotateX(-10deg);
        transform: perspective(400px) rotateX(-10deg);
    }
    70% {
        -webkit-transform: perspective(400px) rotateX(10deg);
        -ms-transform: perspective(400px) rotateX(10deg);
        transform: perspective(400px) rotateX(10deg);
    }
    100% {
        -webkit-transform: perspective(400px) rotateX(0deg);
        -ms-transform: perspective(400px) rotateX(0deg);
        transform: perspective(400px) rotateX(0deg);
        opacity: 1;
    }
}
.flipInX {
    -webkit-backface-visibility: visible !important;
    -ms-backface-visibility: visible !important;
    backface-visibility: visible !important;
    -webkit-animation-name: flipInX;
    animation-name: flipInX;
}
@-webkit-keyframes flipInY {
    0% {
        -webkit-transform: perspective(400px) rotateY(90deg);
        transform: perspective(400px) rotateY(90deg);
        opacity: 0;
    }
    40% {
        -webkit-transform: perspective(400px) rotateY(-10deg);
        transform: perspective(400px) rotateY(-10deg);
    }
    70% {
        -webkit-transform: perspective(400px) rotateY(10deg);
        transform: perspective(400px) rotateY(10deg);
    }
    100% {
        -webkit-transform: perspective(400px) rotateY(0deg);
        transform: perspective(400px) rotateY(0deg);
        opacity: 1;
    }
}
@keyframes flipInY {
    0% {
        -webkit-transform: perspective(400px) rotateY(90deg);
        -ms-transform: perspective(400px) rotateY(90deg);
        transform: perspective(400px) rotateY(90deg);
        opacity: 0;
    }
    40% {
        -webkit-transform: perspective(400px) rotateY(-10deg);
        -ms-transform: perspective(400px) rotateY(-10deg);
        transform: perspective(400px) rotateY(-10deg);
    }
    70% {
        -webkit-transform: perspective(400px) rotateY(10deg);
        -ms-transform: perspective(400px) rotateY(10deg);
        transform: perspective(400px) rotateY(10deg);
    }
    100% {
        -webkit-transform: perspective(400px) rotateY(0deg);
        -ms-transform: perspective(400px) rotateY(0deg);
        transform: perspective(400px) rotateY(0deg);
        opacity: 1;
    }
}
.flipInY {
    -webkit-backface-visibility: visible !important;
    -ms-backface-visibility: visible !important;
    backface-visibility: visible !important;
    -webkit-animation-name: flipInY;
    animation-name: flipInY;
}
@-webkit-keyframes flipOutX {
    0% {
        -webkit-transform: perspective(400px) rotateX(0deg);
        transform: perspective(400px) rotateX(0deg);
        opacity: 1;
    }
    100% {
        -webkit-transform: perspective(400px) rotateX(90deg);
        transform: perspective(400px) rotateX(90deg);
        opacity: 0;
    }
}
@keyframes flipOutX {
    0% {
        -webkit-transform: perspective(400px) rotateX(0deg);
        -ms-transform: perspective(400px) rotateX(0deg);
        transform: perspective(400px) rotateX(0deg);
        opacity: 1;
    }
    100% {
        -webkit-transform: perspective(400px) rotateX(90deg);
        -ms-transform: perspective(400px) rotateX(90deg);
        transform: perspective(400px) rotateX(90deg);
        opacity: 0;
    }
}
.flipOutX {
    -webkit-animation-name: flipOutX;
    animation-name: flipOutX;
    -webkit-backface-visibility: visible !important;
    -ms-backface-visibility: visible !important;
    backface-visibility: visible !important;
}
@-webkit-keyframes flipOutY {
    0% {
        -webkit-transform: perspective(400px) rotateY(0deg);
        transform: perspective(400px) rotateY(0deg);
        opacity: 1;
    }
    100% {
        -webkit-transform: perspective(400px) rotateY(90deg);
        transform: perspective(400px) rotateY(90deg);
        opacity: 0;
    }
}
@keyframes flipOutY {
    0% {
        -webkit-transform: perspective(400px) rotateY(0deg);
        -ms-transform: perspective(400px) rotateY(0deg);
        transform: perspective(400px) rotateY(0deg);
        opacity: 1;
    }
    100% {
        -webkit-transform: perspective(400px) rotateY(90deg);
        -ms-transform: perspective(400px) rotateY(90deg);
        transform: perspective(400px) rotateY(90deg);
        opacity: 0;
    }
}
.flipOutY {
    -webkit-backface-visibility: visible !important;
    -ms-backface-visibility: visible !important;
    backface-visibility: visible !important;
    -webkit-animation-name: flipOutY;
    animation-name: flipOutY;
}
@-webkit-keyframes lightSpeedIn {
    0% {
        -webkit-transform: translateX(100%) skewX(-30deg);
        transform: translateX(100%) skewX(-30deg);
        opacity: 0;
    }
    60% {
        -webkit-transform: translateX(-20%) skewX(30deg);
        transform: translateX(-20%) skewX(30deg);
        opacity: 1;
    }
    80% {
        -webkit-transform: translateX(0%) skewX(-15deg);
        transform: translateX(0%) skewX(-15deg);
        opacity: 1;
    }
    100% {
        -webkit-transform: translateX(0%) skewX(0deg);
        transform: translateX(0%) skewX(0deg);
        opacity: 1;
    }
}
@keyframes lightSpeedIn {
    0% {
        -webkit-transform: translateX(100%) skewX(-30deg);
        -ms-transform: translateX(100%) skewX(-30deg);
        transform: translateX(100%) skewX(-30deg);
        opacity: 0;
    }
    60% {
        -webkit-transform: translateX(-20%) skewX(30deg);
        -ms-transform: translateX(-20%) skewX(30deg);
        transform: translateX(-20%) skewX(30deg);
        opacity: 1;
    }
    80% {
        -webkit-transform: translateX(0%) skewX(-15deg);
        -ms-transform: translateX(0%) skewX(-15deg);
        transform: translateX(0%) skewX(-15deg);
        opacity: 1;
    }
    100% {
        -webkit-transform: translateX(0%) skewX(0deg);
        -ms-transform: translateX(0%) skewX(0deg);
        transform: translateX(0%) skewX(0deg);
        opacity: 1;
    }
}
.lightSpeedIn {
    -webkit-animation-name: lightSpeedIn;
    animation-name: lightSpeedIn;
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
}
@-webkit-keyframes lightSpeedOut {
    0% {
        -webkit-transform: translateX(0%) skewX(0deg);
        transform: translateX(0%) skewX(0deg);
        opacity: 1;
    }
    100% {
        -webkit-transform: translateX(100%) skewX(-30deg);
        transform: translateX(100%) skewX(-30deg);
        opacity: 0;
    }
}
@keyframes lightSpeedOut {
    0% {
        -webkit-transform: translateX(0%) skewX(0deg);
        -ms-transform: translateX(0%) skewX(0deg);
        transform: translateX(0%) skewX(0deg);
        opacity: 1;
    }
    100% {
        -webkit-transform: translateX(100%) skewX(-30deg);
        -ms-transform: translateX(100%) skewX(-30deg);
        transform: translateX(100%) skewX(-30deg);
        opacity: 0;
    }
}
.lightSpeedOut {
    -webkit-animation-name: lightSpeedOut;
    animation-name: lightSpeedOut;
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
}
@-webkit-keyframes rotateIn {
    0% {
        -webkit-transform-origin: center center;
        transform-origin: center center;
        -webkit-transform: rotate(-200deg);
        transform: rotate(-200deg);
        opacity: 0;
    }
    100% {
        -webkit-transform-origin: center center;
        transform-origin: center center;
        -webkit-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
}
@keyframes rotateIn {
    0% {
        -webkit-transform-origin: center center;
        -ms-transform-origin: center center;
        transform-origin: center center;
        -webkit-transform: rotate(-200deg);
        -ms-transform: rotate(-200deg);
        transform: rotate(-200deg);
        opacity: 0;
    }
    100% {
        -webkit-transform-origin: center center;
        -ms-transform-origin: center center;
        transform-origin: center center;
        -webkit-transform: rotate(0);
        -ms-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
}
.rotateIn {
    -webkit-animation-name: rotateIn;
    animation-name: rotateIn;
}
@-webkit-keyframes rotateInDownLeft {
    0% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate(-90deg);
        transform: rotate(-90deg);
        opacity: 0;
    }
    100% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
}
@keyframes rotateInDownLeft {
    0% {
        -webkit-transform-origin: left bottom;
        -ms-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        transform: rotate(-90deg);
        opacity: 0;
    }
    100% {
        -webkit-transform-origin: left bottom;
        -ms-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate(0);
        -ms-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
}
.rotateInDownLeft {
    -webkit-animation-name: rotateInDownLeft;
    animation-name: rotateInDownLeft;
}
@-webkit-keyframes rotateInDownRight {
    0% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
        opacity: 0;
    }
    100% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
}
@keyframes rotateInDownRight {
    0% {
        -webkit-transform-origin: right bottom;
        -ms-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg);
        opacity: 0;
    }
    100% {
        -webkit-transform-origin: right bottom;
        -ms-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate(0);
        -ms-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
}
.rotateInDownRight {
    -webkit-animation-name: rotateInDownRight;
    animation-name: rotateInDownRight;
}
@-webkit-keyframes rotateInUpLeft {
    0% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
        opacity: 0;
    }
    100% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
}
@keyframes rotateInUpLeft {
    0% {
        -webkit-transform-origin: left bottom;
        -ms-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg);
        opacity: 0;
    }
    100% {
        -webkit-transform-origin: left bottom;
        -ms-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate(0);
        -ms-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
}
.rotateInUpLeft {
    -webkit-animation-name: rotateInUpLeft;
    animation-name: rotateInUpLeft;
}
@-webkit-keyframes rotateInUpRight {
    0% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate(-90deg);
        transform: rotate(-90deg);
        opacity: 0;
    }
    100% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
}
@keyframes rotateInUpRight {
    0% {
        -webkit-transform-origin: right bottom;
        -ms-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        transform: rotate(-90deg);
        opacity: 0;
    }
    100% {
        -webkit-transform-origin: right bottom;
        -ms-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate(0);
        -ms-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
}
.rotateInUpRight {
    -webkit-animation-name: rotateInUpRight;
    animation-name: rotateInUpRight;
}
@-webkit-keyframes rotateOut {
    0% {
        -webkit-transform-origin: center center;
        transform-origin: center center;
        -webkit-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
    100% {
        -webkit-transform-origin: center center;
        transform-origin: center center;
        -webkit-transform: rotate(200deg);
        transform: rotate(200deg);
        opacity: 0;
    }
}
@keyframes rotateOut {
    0% {
        -webkit-transform-origin: center center;
        -ms-transform-origin: center center;
        transform-origin: center center;
        -webkit-transform: rotate(0);
        -ms-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
    100% {
        -webkit-transform-origin: center center;
        -ms-transform-origin: center center;
        transform-origin: center center;
        -webkit-transform: rotate(200deg);
        -ms-transform: rotate(200deg);
        transform: rotate(200deg);
        opacity: 0;
    }
}
.rotateOut {
    -webkit-animation-name: rotateOut;
    animation-name: rotateOut;
}
@-webkit-keyframes rotateOutDownLeft {
    0% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
    100% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
        opacity: 0;
    }
}
@keyframes rotateOutDownLeft {
    0% {
        -webkit-transform-origin: left bottom;
        -ms-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate(0);
        -ms-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
    100% {
        -webkit-transform-origin: left bottom;
        -ms-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg);
        opacity: 0;
    }
}
.rotateOutDownLeft {
    -webkit-animation-name: rotateOutDownLeft;
    animation-name: rotateOutDownLeft;
}
@-webkit-keyframes rotateOutDownRight {
    0% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
    100% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate(-90deg);
        transform: rotate(-90deg);
        opacity: 0;
    }
}
@keyframes rotateOutDownRight {
    0% {
        -webkit-transform-origin: right bottom;
        -ms-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate(0);
        -ms-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
    100% {
        -webkit-transform-origin: right bottom;
        -ms-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        transform: rotate(-90deg);
        opacity: 0;
    }
}
.rotateOutDownRight {
    -webkit-animation-name: rotateOutDownRight;
    animation-name: rotateOutDownRight;
}
@-webkit-keyframes rotateOutUpLeft {
    0% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
    100% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate(-90deg);
        transform: rotate(-90deg);
        opacity: 0;
    }
}
@keyframes rotateOutUpLeft {
    0% {
        -webkit-transform-origin: left bottom;
        -ms-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate(0);
        -ms-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
    100% {
        -webkit-transform-origin: left bottom;
        -ms-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        transform: rotate(-90deg);
        opacity: 0;
    }
}
.rotateOutUpLeft {
    -webkit-animation-name: rotateOutUpLeft;
    animation-name: rotateOutUpLeft;
}
@-webkit-keyframes rotateOutUpRight {
    0% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
    100% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
        opacity: 0;
    }
}
@keyframes rotateOutUpRight {
    0% {
        -webkit-transform-origin: right bottom;
        -ms-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate(0);
        -ms-transform: rotate(0);
        transform: rotate(0);
        opacity: 1;
    }
    100% {
        -webkit-transform-origin: right bottom;
        -ms-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg);
        opacity: 0;
    }
}
.rotateOutUpRight {
    -webkit-animation-name: rotateOutUpRight;
    animation-name: rotateOutUpRight;
}
@-webkit-keyframes slideInDown {
    0% {
        opacity: 0;
        -webkit-transform: translateY(-2000px);
        transform: translateY(-2000px);
    }
    100% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
}
@keyframes slideInDown {
    0% {
        opacity: 0;
        -webkit-transform: translateY(-2000px);
        -ms-transform: translateY(-2000px);
        transform: translateY(-2000px);
    }
    100% {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
}
.slideInDown {
    -webkit-animation-name: slideInDown;
    animation-name: slideInDown;
}
@-webkit-keyframes slideInLeft {
    0% {
        opacity: 0;
        -webkit-transform: translateX(-2000px);
        transform: translateX(-2000px);
    }
    100% {
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
}
@keyframes slideInLeft {
    0% {
        opacity: 0;
        -webkit-transform: translateX(-2000px);
        -ms-transform: translateX(-2000px);
        transform: translateX(-2000px);
    }
    100% {
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
}
.slideInLeft {
    -webkit-animation-name: slideInLeft;
    animation-name: slideInLeft;
}
@-webkit-keyframes slideInRight {
    0% {
        opacity: 0;
        -webkit-transform: translateX(2000px);
        transform: translateX(2000px);
    }
    100% {
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
}
@keyframes slideInRight {
    0% {
        opacity: 0;
        -webkit-transform: translateX(2000px);
        -ms-transform: translateX(2000px);
        transform: translateX(2000px);
    }
    100% {
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
}
.slideInRight {
    -webkit-animation-name: slideInRight;
    animation-name: slideInRight;
}
@-webkit-keyframes slideInUp {
    0% {
        opacity: 0;
        -webkit-transform: translateY(2000px);
        transform: translateY(2000px);
    }
    100% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
}
@keyframes slideInUp {
    0% {
        opacity: 0;
        -webkit-transform: translateY(2000px);
        -ms-transform: translateY(2000px);
        transform: translateY(2000px);
    }
    100% {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
}
.slideInUp {
    -webkit-animation-name: slideInUp;
    animation-name: slideInUp;
}
@-webkit-keyframes slideOutLeft {
    0% {
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(-2000px);
        transform: translateX(-2000px);
    }
}
@keyframes slideOutLeft {
    0% {
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(-2000px);
        -ms-transform: translateX(-2000px);
        transform: translateX(-2000px);
    }
}
.slideOutLeft {
    -webkit-animation-name: slideOutLeft;
    animation-name: slideOutLeft;
}
@-webkit-keyframes slideOutRight {
    0% {
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(2000px);
        transform: translateX(2000px);
    }
}
@keyframes slideOutRight {
    0% {
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(2000px);
        -ms-transform: translateX(2000px);
        transform: translateX(2000px);
    }
}
.slideOutRight {
    -webkit-animation-name: slideOutRight;
    animation-name: slideOutRight;
}
@-webkit-keyframes slideOutUp {
    0% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateY(-2000px);
        transform: translateY(-2000px);
    }
}
@keyframes slideOutUp {
    0% {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateY(-2000px);
        -ms-transform: translateY(-2000px);
        transform: translateY(-2000px);
    }
}
.slideOutUp {
    -webkit-animation-name: slideOutUp;
    animation-name: slideOutUp;
}
@-webkit-keyframes hinge {
    0% {
        -webkit-transform: rotate(0);
        transform: rotate(0);
        -webkit-transform-origin: top left;
        transform-origin: top left;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
    }
    20%, 60% {
        -webkit-transform: rotate(80deg);
        transform: rotate(80deg);
        -webkit-transform-origin: top left;
        transform-origin: top left;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
    }
    40% {
        -webkit-transform: rotate(60deg);
        transform: rotate(60deg);
        -webkit-transform-origin: top left;
        transform-origin: top left;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
    }
    80% {
        -webkit-transform: rotate(60deg) translateY(0);
        transform: rotate(60deg) translateY(0);
        opacity: 1;
        -webkit-transform-origin: top left;
        transform-origin: top left;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
    }
    100% {
        -webkit-transform: translateY(700px);
        transform: translateY(700px);
        opacity: 0;
    }
}
@keyframes hinge {
    0% {
        -webkit-transform: rotate(0);
        -ms-transform: rotate(0);
        transform: rotate(0);
        -webkit-transform-origin: top left;
        -ms-transform-origin: top left;
        transform-origin: top left;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
    }
    20%, 60% {
        -webkit-transform: rotate(80deg);
        -ms-transform: rotate(80deg);
        transform: rotate(80deg);
        -webkit-transform-origin: top left;
        -ms-transform-origin: top left;
        transform-origin: top left;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
    }
    40% {
        -webkit-transform: rotate(60deg);
        -ms-transform: rotate(60deg);
        transform: rotate(60deg);
        -webkit-transform-origin: top left;
        -ms-transform-origin: top left;
        transform-origin: top left;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
    }
    80% {
        -webkit-transform: rotate(60deg) translateY(0);
        -ms-transform: rotate(60deg) translateY(0);
        transform: rotate(60deg) translateY(0);
        opacity: 1;
        -webkit-transform-origin: top left;
        -ms-transform-origin: top left;
        transform-origin: top left;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
    }
    100% {
        -webkit-transform: translateY(700px);
        -ms-transform: translateY(700px);
        transform: translateY(700px);
        opacity: 0;
    }
}
.hinge {
    -webkit-animation-name: hinge;
    animation-name: hinge;
}
/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */
 @-webkit-keyframes rollIn {
    0% {
        opacity: 0;
        -webkit-transform: translateX(-100%) rotate(-120deg);
        transform: translateX(-100%) rotate(-120deg);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateX(0px) rotate(0deg);
        transform: translateX(0px) rotate(0deg);
    }
}
@keyframes rollIn {
    0% {
        opacity: 0;
        -webkit-transform: translateX(-100%) rotate(-120deg);
        -ms-transform: translateX(-100%) rotate(-120deg);
        transform: translateX(-100%) rotate(-120deg);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateX(0px) rotate(0deg);
        -ms-transform: translateX(0px) rotate(0deg);
        transform: translateX(0px) rotate(0deg);
    }
}
.rollIn {
    -webkit-animation-name: rollIn;
    animation-name: rollIn;
}
/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */
 @-webkit-keyframes rollOut {
    0% {
        opacity: 1;
        -webkit-transform: translateX(0px) rotate(0deg);
        transform: translateX(0px) rotate(0deg);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(100%) rotate(120deg);
        transform: translateX(100%) rotate(120deg);
    }
}
@keyframes rollOut {
    0% {
        opacity: 1;
        -webkit-transform: translateX(0px) rotate(0deg);
        -ms-transform: translateX(0px) rotate(0deg);
        transform: translateX(0px) rotate(0deg);
    }
    100% {
        opacity: 0;
        -webkit-transform: translateX(100%) rotate(120deg);
        -ms-transform: translateX(100%) rotate(120deg);
        transform: translateX(100%) rotate(120deg);
    }
}
.rollOut {
    -webkit-animation-name: rollOut;
    animation-name: rollOut;
}
/*
==============================================
Flip that shit
==============================================
*/

/* entire container, keeps perspective */
 body .flip-container {
    width: 100%;
}
body .flip-container .flipper {
    position: relative;
}
/* hide back of pane during swap */
 body .flip-container .flipper .front, body .flip-container .flipper .back {
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transform: perspective(1000px) rotateY(180deg);
    -moz-transform: perspective(1000px) rotateY(180deg);
    -o-transform: perspective(1000px) rotateY(180deg);
    transform: perspective(1000px) rotateY(180deg);
    -webkit-transition: 0.6s;
    -moz-transition: 0.6s;
    -o-transition: 0.6s;
    transition: 0.6s;
}
/* front pane, placed above back */
 body .flip-container .flipper .front {
    z-index: 2;
    -webkit-transform: perspective(1000px) rotateY(0);
    -moz-transform: perspective(1000px) rotateY(0);
    -o-transform: perspective(1000px) rotateY(0);
    transform: perspective(1000px) rotateY(0);
}
/* front pane, placed above back */
 body .flip-container:hover .flipper .front {
    -webkit-animation: 0;
    opactity: 0;
    -webkit-transform: perspective(1000px) rotateY(-179.9deg);
    -moz-transform: perspective(1000px) rotateY(-179.9deg);
    -o-transform: perspective(1000px) rotateY(-179.9deg);
    transform: perspective(1000px) rotateY(-179.9deg);
}
/* back, initially hidden pane */
 body .flip-container:hover .flipper .back {
    opcaity: .1;
    position: absolute;
    z-index:3;
    -webkit-transform: perspective(1000px) rotateY(0);
    -moz-transform: perspective(1000px) rotateY(0);
    -o-transform: perspective(1000px) rotateY(0);
    transform: perspective(1000px) rotateY(0);
}
/*
==============================================
floating
==============================================
*/
 .floating {
    animation-name: floating;
    -webkit-animation-name: floating;
    -moz-animation-name: floating;
    -o-animation-name: floating;
    animation-duration: 1.5s;
    -webkit-animation-duration: 1.5s;
    -moz-animation-duration: 1.5s;
    -o-animation-duration: 1.5s;
    animation-iteration-count: infinite;
    -webkit-animation-iteration-count: infinite;
    -moz-animation-iteration-count: infinite;
    -o-animation-iteration-count: infinite;
}
@keyframes floating {
    0% {
        transform: translateY(0%);
    }
    50% {
        transform: translateY(8%);
    }
    100% {
        transform: translateY(0%);
    }
}
@-webkit-keyframes floating {
    0% {
        -webkit-transform: translateY(0%);
    }
    50% {
        -webkit-transform: translateY(8%);
    }
    100% {
        -webkit-transform: translateY(0%);
    }
}
@-moz-keyframes floating {
    0% {
        -moz-transform: translateY(0%);
    }
    50% {
        -moz-transform: translateY(8%);
    }
    100% {
        -moz-transform: translateY(0%);
    }
}
@-o-keyframes floating {
    0% {
        -o-transform: translateY(0%);
    }
    50% {
        -o-transform: translateY(8%);
    }
    100% {
        -o-transform: translateY(0%);
    }
}
/*
==============================================
Custom BS3
==============================================
*/
 .jumbo-profile {
    background: #2c3e50;
    color: #fff;
}
.jumbo-docs {
    background: #ecf0f1;
    color:;
}
.jumbo-docs-well {
    background:;
}
.jumbo-singledoc {
    background: #34495e;
}
.profile-jumbo-text .small {
    color: #fff;
}
.progress {
    background:transparent !important;
    box-shadow:none !important;
    height: 5px;
    border-radius: 2px;
    margin-bottom: 10px;
}
/* Custom Full Calendar */

/*
  button states
  borrowed from twitter bootstrap (http://twitter.github.com/bootstrap/)
*/
 .fc-state-default {
    background-color: #fff;
    background-image: none;
    background-image: none;
    background-image: none;
    background-image: none background-image: none;
    background-repeat:none;
    border-color: #ccc;
    border-color: #ccc;
    color: #333;
    text-shadow: none;
    box-shadow: none;
}
.fc-state-default:hover {
    color: #333;
    background-color: #ebebeb;
    border-color: #adadad;
}
/* Global Event Styles
------------------------------------------------------------------------*/
 .fc-event {
    border: 1px solid #357ebd;
    /* changed BORDER color */
    background-color: #428bca;
    /* changed BACKGROUND color */
}
.fc-event: hover {
    border: 1px solid #357ebd;
    /* changed BORDER color */
    background-color: #357ebd;
    /* changed BACKGROUND color */
}
/* Horizontal Events
------------------------------------------------------------------------*/

/* resizable */
 .fc-event-hori .ui-resizable-e {
    top: 0 !important;
    /* importants override pre jquery ui 1.7 styles */
    right: -3px !important;
    width: 20px !important;
    height: 100% !important;
    cursor: e-resize;
}
.fc-event-hori .ui-resizable-w {
    top: 0 !important;
    left: -3px !important;
    width: 2px !important;
    height: 100% !important;
    cursor: w-resize;
}
/* stylish circle */
 .stylish {
    display:block;
    width:100px;
    height:100px;
    border-radius:66px;
    border:4px double #ccc;
    font-size:20px;
    color:#666;
    line-height:100px;
    text-align:center;
    text-decoration:none;
    text-shadow:0 1px 0 #fff;
    background:#ddd
}
.stylish:hover {
    border:4px double #bbb;
    color:#aaa;
    text-decoration:none;
    background:#e6e6e6
}
.overview-expand {
    -webkit-transition: all 1s ease-out;
}
.overview-tabs-expand {
    -webkit-transition-delay: 2s;
    opacity: 1;
}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<head>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">
</head>
<body>
    <div class="navbar navbar-fixed-top navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> 
                </button> <a href="#" class="navbar-brand">mchp</a> 
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"> <a href="#"><i class="fa fa-home"></i></a> 
                    </li>
                    <li> <a href="#"><i class="fa fa-calendar"></i></a> 
                    </li>
                    <li> <a href="#"><i class="fa fa-book"></i></a> 
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge" id="userPoints">3500</span> <i class="fa fa-certificate"></i></a>

                        <ul class="dropdown-menu">
                            <li> <a href="#" id="purchasePointsMenu"><span class="label label-primary"><i class="fa fa-usd"></i></span> Purchase More Points</a> 
                            </li>
                            <li class="divider"></li>
                            <li> <a><span class="label label-success">+</span> 1000 Points Purchase</a> 
                            </li>
                            <li> <a><span class="label label-success">+</span> 500 Document Sold</a> 
                            </li>
                            <li> <a><span class="label label-danger">-</span> 200 Document Bought</a> 
                            </li>
                            <li> <a><span class="label label-danger">-</span> 100 Class Unlocked</a> 
                            </li>
                            <li> <a><span class="label label-success">+</span> 50 Achievement</a> 
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge">10</span> <i class="fa fa-lightbulb-o"></i></a>

                        <ul class="dropdown-menu">
                            <li> <a><span class="label label-success">New</span> ACCT-200 Document Added </a> 
                            </li>
                            <li> <a><span class="label label-success">New</span> ACCT-200 Assignment Updated</a> 
                            </li>
                            <li> <a><span class="label label-default">Read</span> Some notification</a> 
                            </li>
                            <li> <a><span class="label label-default">Read</span> Some notification</a> 
                            </li>
                            <li> <a><span class="label label-default">Read</span> Some notification</a> 
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> mitchellias <b class="caret"></b> </a>

                        <ul class="dropdown-menu">
                            <li> <a href="/account/"><i class="fa fa-user"></i> Your Account</a> 
                            </li>
                            <li> <a href="/sales/"><i class="fa fa-dollar"></i> Your Sales</a> 
                            </li>
                            <li class="divider"></li>
                            <li> <a href="/logout/"><i class="fa fa-share-square-o"></i> Logout</a> 
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div id="overview" class="col-sm-4 col-md-3 animated bounceInUp">

                <h2>Your Calendars</h2>
  
      <h5><a data-toggle="collapse" href="#collapseTwo">
          <i class="fa fa-cal fa-fw"></i>Calendars you Follow
        </a></h5>
        
        <div id="collapseTwo" class="collapse in">
        <div class="list-group">
            <div class="list-group-item">
                <a href="#course_1" data-toggle="collapse" class="text-success"><strong>MGMT 310A</strong></a> 
<span class="badge pull-right">2</span>
                <div id="course_1" class="collapse">
                Mitch's calendar
            </div>
            </div>
            </div>

    
    

                           
        
        
                       
                           
        <!--<div id="course_1" class="collapse">
            
              <div class="checkbox">
  <label>
    <input type="checkbox" value="">
    James A.'s Calendar
  </label>
                           </div>
                  <div class="checkbox">
  <label>
    <input type="checkbox" value="">
    Sara K.'s Calendar
  </label>
                           </div>         
            </div> -->
                  <!--start second class -->
                  
                         <div class="checkbox">
  <label>
    <input type="checkbox" value="">
        <a href="#course_2" data-toggle="collapse" class="text-info"><strong>MKTG 361</strong></a> 
  </label><span class="badge pull-right">1</span>
                           </div>
        <div id="course_2" class="collapse">
            <hr style="margin:10px auto;">
              <div class="checkbox">
  <label>
    <input type="checkbox" value="">
    Sam G.'s Calendar
  </label>
                           </div>
                 

                </div>
                </div>                
                
            </div>
            <!-- End Column -->
            <div id="calendar" class="col-sm-8 col-md-9 animated animated-sm bounceInUp">
                 <h2>Calendar <small>plan it</small><i class="fa fa-plus fa-fw pull-right small btn btn-block"></i></h2>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="calendar fc fc-ltr">
                            <table class="fc-header" style="width:100%">
                                <tbody>
                                    <tr>
                                        <td class="fc-header-left">
                                            <div class="btn-group">
                                                <button type="button" class="fc-button-prev fc-corner-left btn btn-default btn-sm"> <i class="fa fa-chevron-left"></i>

                                                </button>
                                                <button type="button" class="btn btn-default btn-sm"> <i class="fa fa-chevron-right"></i>

                                                </button>
                                            </div> <span class="fc-button fc-button-prev fc-state-default fc-corner-left" unselectable="on"><span class="fc-text-arrow">‹</span></span> <span class="fc-button fc-button-next fc-state-default fc-corner-right" unselectable="on"><span class="fc-text-arrow">›</span></span> <span class="fc-header-space"></span><span class="fc-button fc-button-today fc-state-default fc-corner-left fc-corner-right fc-state-disabled" unselectable="on">today</span>

                                        </td>
                                        <td class="fc-header-center"> <span class="fc-header-title">          <h2>January 2014</h2>          </span>

                                        </td>
                                        <td class="fc-header-right"> <span class="fc-button fc-button-month fc-state-default fc-corner-left fc-state-active" unselectable="on">month</span><span class="fc-button fc-button-agendaWeek fc-state-default" unselectable="on">week</span><span class="fc-button fc-button-agendaDay fc-state-default fc-corner-right" unselectable="on">day</span>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="fc-content" style="position: relative; min-height: 1px;">
                                <div class="fc-view fc-view-month fc-grid" style="position: relative; min-height: 1px;" unselectable="on">
                                    <div style="position:absolute;z-index:8;top:0;left:0">
                                        <div class="fc-event fc-event-hori fc-event-draggable fc-event-start fc-event-end ui-draggable" style="position: absolute; z-index: 8; left: 495px; top: 60px;" unselectable="on">
                                            <div class="fc-event-inner"> <span class="fc-event-title" style="position:relative; left:18px; top:10px;font-size:20px;">3</span>

                                            </div>
                                            <div class="ui-resizable-handle ui-resizable-e">   </div>
                                        </div>
                                        <div class="fc-event fc-event-hori fc-event-draggable fc-event-start" style="position: absolute; z-index: 8; left: 804px; width: 304px; top: 352px;">
                                            <div class="fc-event-inner"> <span class="fc-event-title" style="position:relative; left:18px; top:10px;font-size:20px;">5</span>

                                            </div>
                                        </div>
                                        <div class="fc-event fc-event-hori fc-event-draggable fc-event-end" style="position: absolute; z-index: 8; left: 20px; top: 470px;">
                                            <div class="fc-event-inner"> <span class="fc-event-title" style="position:relative;left:17px;top:9px;font-size:20px;">2</span>

                                            </div>
                                            <div class="ui-resizable-handle ui-resizable-e">   </div>
                                        </div>
                                        <div class="fc-event fc-event-hori fc-event-draggable fc-event-start fc-event-end" style="position: absolute; z-index: 8; left: 306px; top: 265px;">
                                            <div class="fc-event-inner"> <span class="fc-event-title" style="position:relative; top:11px; left:18px; font-size:20px;">2</span>

                                            </div>
                                            <div class="ui-resizable-handle ui-resizable-e">   </div>
                                        </div>
                                    </div>
                                    <table class="fc-border-separate" style="width:100%" cellspacing="0">
                                        <thead>
                                            <tr class="fc-first fc-last">
                                                <th class="fc-day-header fc-sun fc-widget-header fc-first" style="width: 158px;">Sun</th>
                                                <th class="fc-day-header fc-mon fc-widget-header" style="width: 158px;">Mon</th>
                                                <th class="fc-day-header fc-tue fc-widget-header" style="width: 158px;">Tue</th>
                                                <th class="fc-day-header fc-wed fc-widget-header" style="width: 158px;">Wed</th>
                                                <th class="fc-day-header fc-thu fc-widget-header" style="width: 158px;">Thu</th>
                                                <th class="fc-day-header fc-fri fc-widget-header" style="width: 158px;">Fri</th>
                                                <th class="fc-day-header fc-sat fc-widget-header fc-last" style="width: 158px;">Sat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="fc-week fc-first">
                                                <td class="fc-day fc-sun fc-widget-content fc-other-month fc-first" data-date="2013-12-29">
                                                    <div style="min-height: 80px;">
                                                        <div class="fc-day-number">29</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-mon fc-widget-content fc-other-month" data-date="2013-12-30">
                                                    <div>
                                                        <div class="fc-day-number">30</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-tue fc-widget-content fc-other-month" data-date="2013-12-31">
                                                    <div>
                                                        <div class="fc-day-number">31</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-wed fc-widget-content" data-date="2014-01-01">
                                                    <div>
                                                        <div class="fc-day-number">1</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-thu fc-widget-content" data-date="2014-01-02">
                                                    <div>
                                                        <div class="fc-day-number">2</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-fri fc-widget-content" data-date="2014-01-03">
                                                    <div>
                                                        <div class="fc-day-number">3</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-sat fc-widget-content fc-last" data-date="2014-01-04">
                                                    <div>
                                                        <div class="fc-day-number">4</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="fc-week">
                                                <td class="fc-day fc-sun fc-widget-content fc-first" data-date="2014-01-05">
                                                    <div style="min-height: 80px;">
                                                        <div class="fc-day-number">5</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 0px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-mon fc-widget-content" data-date="2014-01-06">
                                                    <div>
                                                        <div class="fc-day-number">6</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 0px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-tue fc-widget-content" data-date="2014-01-07">
                                                    <div>
                                                        <div class="fc-day-number">7</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 0px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-wed fc-widget-content" data-date="2014-01-08">
                                                    <div>
                                                        <div class="fc-day-number">8</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 0px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-thu fc-widget-content" data-date="2014-01-09">
                                                    <div>
                                                        <div class="fc-day-number">9</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 0px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-fri fc-widget-content" data-date="2014-01-10">
                                                    <div>
                                                        <div class="fc-day-number">10</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 0px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-sat fc-widget-content fc-last" data-date="2014-01-11">
                                                    <div>
                                                        <div class="fc-day-number">11</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 0px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="fc-week">
                                                <td class="fc-day fc-sun fc-widget-content fc-first" data-date="2014-01-12">
                                                    <div style="min-height: 80px;">
                                                        <div class="fc-day-number">12</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-mon fc-widget-content" data-date="2014-01-13">
                                                    <div>
                                                        <div class="fc-day-number">13</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-tue fc-widget-content" data-date="2014-01-14">
                                                    <div>
                                                        <div class="fc-day-number">14</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-wed fc-widget-content" data-date="2014-01-15">
                                                    <div>
                                                        <div class="fc-day-number">15</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-thu fc-widget-content" data-date="2014-01-16">
                                                    <div>
                                                        <div class="fc-day-number">16</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-fri fc-widget-content" data-date="2014-01-17">
                                                    <div>
                                                        <div class="fc-day-number">17</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-sat fc-widget-content fc-last" data-date="2014-01-18">
                                                    <div>
                                                        <div class="fc-day-number">18</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="fc-week">
                                                <td class="fc-day fc-sun fc-widget-content fc-first" data-date="2014-01-19">
                                                    <div style="min-height: 80px;">
                                                        <div class="fc-day-number">19</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-mon fc-widget-content" data-date="2014-01-20">
                                                    <div>
                                                        <div class="fc-day-number">20</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-tue fc-widget-content" data-date="2014-01-21">
                                                    <div>
                                                        <div class="fc-day-number">21</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-wed fc-widget-content fc-today fc-state-highlight" data-date="2014-01-22">
                                                    <div>
                                                        <div class="fc-day-number">22</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative;;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-thu fc-widget-content" data-date="2014-01-23">
                                                    <div>
                                                        <div class="fc-day-number">23</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-fri fc-widget-content" data-date="2014-01-24">
                                                    <div>
                                                        <div class="fc-day-number">24</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-sat fc-widget-content fc-last" data-date="2014-01-25">
                                                    <div>
                                                        <div class="fc-day-number">25</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="fc-week">
                                                <td class="fc-day fc-sun fc-widget-content fc-first" data-date="2014-01-26">
                                                    <div style="min-height: 80px;">
                                                        <div class="fc-day-number">26</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-mon fc-widget-content" data-date="2014-01-27">
                                                    <div>
                                                        <div class="fc-day-number">27</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-tue fc-widget-content" data-date="2014-01-28">
                                                    <div>
                                                        <div class="fc-day-number">28</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-wed fc-widget-content" data-date="2014-01-29">
                                                    <div>
                                                        <div class="fc-day-number">29</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-thu fc-widget-content" data-date="2014-01-30">
                                                    <div>
                                                        <div class="fc-day-number">30</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-fri fc-widget-content" data-date="2014-01-31">
                                                    <div>
                                                        <div class="fc-day-number">31</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-sat fc-widget-content fc-other-month fc-last" data-date="2014-02-01">
                                                    <div>
                                                        <div class="fc-day-number">1</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 25px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="fc-week fc-last">
                                                <td class="fc-day fc-sun fc-widget-content fc-other-month fc-first" data-date="2014-02-02">
                                                    <div style="min-height: 80px;">
                                                        <div class="fc-day-number">2</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 0px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-mon fc-widget-content fc-other-month" data-date="2014-02-03">
                                                    <div>
                                                        <div class="fc-day-number">3</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 0px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-tue fc-widget-content fc-other-month" data-date="2014-02-04">
                                                    <div>
                                                        <div class="fc-day-number">4</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 0px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-wed fc-widget-content fc-other-month" data-date="2014-02-05">
                                                    <div>
                                                        <div class="fc-day-number">5</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 0px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-thu fc-widget-content fc-other-month" data-date="2014-02-06">
                                                    <div>
                                                        <div class="fc-day-number">6</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 0px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-fri fc-widget-content fc-other-month" data-date="2014-02-07">
                                                    <div>
                                                        <div class="fc-day-number">7</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 0px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fc-day fc-sat fc-widget-content fc-other-month fc-last" data-date="2014-02-08">
                                                    <div>
                                                        <div class="fc-day-number">8</div>
                                                        <div class="fc-day-content">
                                                            <div style="position: relative; height: 0px;"> </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="unlockModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     <h4 class="modal-title" id="myModalLabel"><i class="fa fa-fw fa-unlock"></i> Unlock Calendar</h4>

                </div>
                <div class="modal-body">
                    <p class="h3 text-center text-primary"><i class="fa fa-thumbs-up"></i> Woop!</p>
                    <p class="lead text-center">Here's what happens when you unlock your calendar:</p>
                    <hr>
                    <div class="row">
                        <div class="col-xs-1"> <i class="fa fa-fw fa-thumbs-up text-primary"></i>

                        </div>
                        <div class="col-xs-11">You'll instantly get access to all <strong class="text-primary">67 shared assignments</strong> on your calendar.</div>
                        <div class="col-xs-1"> <i class="fa fa-fw fa-thumbs-up text-primary"></i>

                        </div>
                        <div class="col-xs-11">You'll be <strong>notified</strong> whenever a shared assignment is <strong>updated or edited</strong> throughout the semester.</div>
                        <div class="col-xs-1"> <i class="fa fa-fw fa-thumbs-up text-primary"></i>

                        </div>
                        <div class="col-xs-11">You'll be able to <strong>share your own calendar assignments</strong> with your class, which means you can start making money instantly.</div>
                        <div class="col-xs-1"> <i class="fa fa-fw fa-thumbs-up text-primary"></i>

                        </div>
                        <div class="col-xs-11">You'll gain access to special features of mchp, such as <strong>calendar integration</strong> in your College Pulse and in each of your class's activity sections.</div>
                    </div>
                    <hr>
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <!-- Table -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Class Name</th>
                                    <th># of Assignments</th>
                                    <th>Unlock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fa fa-book"></i> ECON 200</td>
                                    <td><strong class="text-primary"><i class="fa fa-calendar"></i> 15 now</strong> + all future</td>
                                    <td><i class="fa fa-check-circle text-success"> yes</i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-book"></i> ACCT 210</td>
                                    <td><strong class="text-primary"><i class="fa fa-calendar"></i> 22 now</strong> + all future</td>
                                    <td><i class="fa fa-check-circle text-success"> yes</i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-book"></i> MGMT 310</td>
                                    <td><strong class="text-primary"><i class="fa fa-calendar"></i> 30 now</strong> + all future</td>
                                    <td> <i class="fa fa-check-circle text-success"> yes</i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="panel-footer text-center">You're unlocking: <strong>3 classes</strong> for <strong>300 points</strong>
                        </div>
                    </div>
                    <!-- Begin Carousel -- <div id="carousel-example-generic" class="carousel slide">
                  
  <!-- Indicators 
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>-->
                    <!-- Wrapper for slides -- <div class="carousel-inner">
    <div class="item ">
        <div class="custom-content">
      <div class="media">
  <a class="pull-left" href="#">
    <img class="media-object" src="https://s3-us-west-2.amazonaws.com/mchpstatic/calendar.svg" alt="...">
  </a>
  <div class="media-body">
    <h4 class="media-heading">Poop Assignments</h4>
    <p>Any assignment shared by any of your classmates will be visible to you, and you'll get the option to add it to your own calendar. This includes any assignment that is updated or edited throughout the semester.</p>
  </div>
</div>
            </div>
      
    </div>
    
  </div>
                  
                  
                  <div class="carousel-inner">
    <div class="item ">
        <div class="custom-content">
      <div class="media">
  <a class="pull-left" href="#">
    <img class="media-object" src="https://s3-us-west-2.amazonaws.com/mchpstatic/calendar.svg" alt="...">
  </a>
  <div class="media-body">
    <h4 class="media-heading">Poop Assignments</h4>
    <p>Any assignment shared by any of your classmates will be visible to you, and you'll get the option to add it to your own calendar. This includes any assignment that is updated or edited throughout the semester.</p>
  </div>
</div>
            </div>
      
    </div>
    
  </div>
                  
                  
  <div class="carousel-inner">
    <div class="item active">
        <div class="custom-content">
      <div class="media">
  <a class="pull-left" href="#">
    <img class="media-object" src="https://s3-us-west-2.amazonaws.com/mchpstatic/calendar.svg" alt="...">
  </a>
  <div class="media-body">
    <h4 class="media-heading">Shared Assignments</h4>
    <p>Any assignment shared by any of your classmates will be visible to you, and you'll get the option to add it to your own calendar. This includes any assignment that is updated or edited throughout the semester.</p>
  </div>
</div>
            </div>
      
    </div>
    
  </div>
      
      


  <!-- Controls --
    <p class="pull-right">
        <a class="" href="#carousel-example-generic" data-slide="prev"><i class="fa fa-hand-o-left fa-lg"></i></a> 
        <a class="" href="#carousel-example-generic" data-slide="next"><i class="fa fa-hand-o-right fa-lg"></i></a> 
        
    </p>    
</div>
                      
              <!-- End Carousel --></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Unlock!</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->