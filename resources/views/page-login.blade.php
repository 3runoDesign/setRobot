{{--
  Template Name: Login
--}}

@extends('layouts.blank')

@section('top-style')
    <style media="screen">

    /**! 02. Typography **/
    html {
      font-size: 87.5%;
    }
    @media all and (max-width: 768px) {
      html {
        font-size: 81.25%;
      }
    }
    body {
      font-size: 1em;
      line-height: 1.85714286em;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      font-family: 'Open Sans', 'Helvetica', 'Arial', sans-serif;
      color: #666666;
      font-weight: 400;
    }
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {
      font-family: 'Open Sans', 'Helvetica', 'Arial', sans-serif;
      color: #252525;
      font-weight: 300;
      font-variant-ligatures: common-ligatures;
      margin-top: 0;
      margin-bottom: 0;
    }
    h1,
    .h1 {
      font-size: 3.14285714em;
      line-height: 1.31818182em;
    }
    h2,
    .h2 {
      font-size: 2.35714286em;
      line-height: 1.36363636em;
    }
    h3,
    .h3 {
      font-size: 1.78571429em;
      line-height: 1.5em;
    }
    h4,
    .h4 {
      font-size: 1.35714286em;
      line-height: 1.68421053em;
    }
    h5,
    .h5 {
      font-size: 1em;
      line-height: 1.85714286em;
    }
    h6,
    .h6 {
      font-size: 0.85714286em;
      line-height: 2.16666667em;
    }
    .lead {
      font-size: 1.35714286em;
      line-height: 1.68421053em;
    }
    @media all and (max-width: 767px) {
      h1,
      .h1 {
        font-size: 2.35714286em;
        line-height: 1.36363636em;
      }
      h2,
      .h2 {
        font-size: 1.78571429em;
        line-height: 1.5em;
      }
      h3,
      .h3 {
        font-size: 1.35714286em;
        line-height: 1.85714286em;
      }
      .lead {
        font-size: 1.35714286em;
        line-height: 1.68421053em;
      }
    }
    p,
    ul,
    ol,
    pre,
    table,
    blockquote {
      margin-bottom: 1.85714286em;
    }
    ul,
    ol {
      list-style: none;
      line-height: 1.85714286em;
    }
    ul.bullets {
      list-style: inside;
    }
    ol {
      list-style-type: upper-roman;
      list-style-position: inside;
    }
    blockquote {
      font-size: 1.78571429em;
      line-height: 1.5em;
      padding: 0;
      margin: 0;
      border-left: 0;
    }
    strong {
      font-weight: 600;
    }
    hr {
      margin: 1.85714286em 0;
      border-color: #fafafa;
    }
    a:hover,
    a:focus,
    a:active {
      text-decoration: none;
      outline: none;
    }
    /*! Typography -- Helpers */
    .type--fade {
      opacity: .5;
    }
    .type--uppercase {
      text-transform: uppercase;
    }
    .type--bold {
      font-weight: bold;
    }
    .type--italic {
      font-style: italic;
    }
    .type--fine-print {
      font-size: 0.85714286em;
    }
    .type--strikethrough {
      text-decoration: line-through;
      opacity: .5;
    }
    .type--underline {
      text-decoration: underline;
    }
    .type--body-font {
      font-family: 'Open Sans', 'Helvetica';
    }
    /**! 03. Position **/
    body {
      overflow-x: hidden;
    }
    .pos-relative {
      position: relative;
    }
    .pos-absolute {
      position: absolute;
    }
    .pos-absolute.container {
      left: 0;
      right: 0;
    }
    .pos-top {
      top: 0;
    }
    .pos-bottom {
      bottom: 0;
    }
    .pos-right {
      right: 0;
    }
    .pos-left {
      left: 0;
    }
    .float-left {
      float: left;
    }
    .float-right {
      float: right;
    }
    @media all and (max-width: 767px) {
      .float-left,
      .float-right {
        float: none;
      }
      .float-left-xs {
        float: left;
      }
      .float-right-xs {
        float: right;
      }
    }
    .pos-vertical-center {
      position: relative;
      top: 50%;
      transform: translateY(-50%);
      -webkit-transform: translateY(-50%);
    }
    @media all and (max-width: 767px) {
      .pos-vertical-center {
        top: 0;
        transform: none;
        -webkit-transform: none;
      }
    }
    @media all and (max-height: 600px) {
      .pos-vertical-center {
        top: 0;
        transform: none;
        -webkit-transform: none;
      }
    }
    .pos-vertical-align-columns {
      display: table;
      table-layout: fixed;
      width: 100%;
    }
    .pos-vertical-align-columns > div[class*='col-'] {
      display: table-cell;
      float: none;
      vertical-align: middle;
    }
    @media all and (max-width: 990px) {
      .pos-vertical-align-columns {
        display: block;
        width: auto;
      }
      .pos-vertical-align-columns > div[class*='col-'] {
        display: block;
      }
    }
    .inline-block {
      display: inline-block;
    }
    .block {
      display: block;
    }
    @media all and (max-width: 767px) {
      .block--xs {
        display: block;
      }
    }
    @media all and (max-width: 990px) {
      .text-center-md {
        text-align: center;
      }
      .text-left-md {
        text-align: left;
      }
      .text-right-md {
        text-align: right;
      }
    }
    @media all and (max-width: 767px) {
      .text-center-xs {
        text-align: center;
      }
      .text-left-xs {
        text-align: left;
      }
      .text-right-xs {
        text-align: right;
      }
    }
    /**! 04. Element Size **/
    .height-100,
    .height-90,
    .height-80,
    .height-70,
    .height-60,
    .height-50,
    .height-40,
    .height-30,
    .height-20,
    .height-10 {
      height: auto;
      padding: 5em 0;
    }
    @media all and (max-width: 767px) {
      .height-100,
      .height-90,
      .height-80,
      .height-70,
      .height-60,
      .height-50,
      .height-40,
      .height-30,
      .height-20,
      .height-10 {
        height: auto;
        padding: 4em 0;
      }
    }
    @media all and (min-height: 600px) and (min-width: 767px) {
      .height-10 {
        height: 10vh;
      }
      .height-20 {
        height: 20vh;
      }
      .height-30 {
        height: 30vh;
      }
      .height-40 {
        height: 40vh;
      }
      .height-50 {
        height: 50vh;
      }
      .height-60 {
        height: 60vh;
      }
      .height-70 {
        height: 70vh;
      }
      .height-80 {
        height: 80vh;
      }
      .height-90 {
        height: 90vh;
      }
      .height-100 {
        height: 100vh;
      }
    }
    section.height-auto {
      height: auto;
    }
    section.height-auto .pos-vertical-center {
      top: 0;
      position: relative;
      transform: none;
    }
    @media all and (max-width: 767px) {
      div[class*='col-'][class*='height-'] {
        padding-top: 5.57142857em !important;
        padding-bottom: 5.57142857em !important;
      }
    }
    /**! 05. Images **/
    img {
      max-width: 100%;
      margin-bottom: 1.85714286em;
    }
    /*p+img, img:last-child{
        margin-bottom: 0;
    }*/
    .img--fullwidth {
      width: 100%;
    }
    [data-grid="2"].masonry {
      -webkit-column-count: 2;
      -webkit-column-gap: 0;
      -moz-column-count: 2;
      -moz-column-gap: 0;
      column-count: 2;
      column-gap: 0;
    }
    [data-grid="2"].masonry li {
      width: 100%;
      float: none;
    }
    [data-grid="2"] li {
      width: 50%;
      display: inline-block;
    }
    [data-grid="3"].masonry {
      -webkit-column-count: 3;
      -webkit-column-gap: 0;
      -moz-column-count: 3;
      -moz-column-gap: 0;
      column-count: 3;
      column-gap: 0;
    }
    [data-grid="3"].masonry li {
      width: 100%;
      float: none;
    }
    [data-grid="3"] li {
      width: 33.33333333%;
      display: inline-block;
    }
    [data-grid="4"].masonry {
      -webkit-column-count: 4;
      -webkit-column-gap: 0;
      -moz-column-count: 4;
      -moz-column-gap: 0;
      column-count: 4;
      column-gap: 0;
    }
    [data-grid="4"].masonry li {
      width: 100%;
      float: none;
    }
    [data-grid="4"] li {
      width: 25%;
      display: inline-block;
    }
    [data-grid="5"].masonry {
      -webkit-column-count: 5;
      -webkit-column-gap: 0;
      -moz-column-count: 5;
      -moz-column-gap: 0;
      column-count: 5;
      column-gap: 0;
    }
    [data-grid="5"].masonry li {
      width: 100%;
      float: none;
    }
    [data-grid="5"] li {
      width: 20%;
      display: inline-block;
    }
    [data-grid="6"].masonry {
      -webkit-column-count: 6;
      -webkit-column-gap: 0;
      -moz-column-count: 6;
      -moz-column-gap: 0;
      column-count: 6;
      column-gap: 0;
    }
    [data-grid="6"].masonry li {
      width: 100%;
      float: none;
    }
    [data-grid="6"] li {
      width: 16.66666667%;
      display: inline-block;
    }
    [data-grid="7"].masonry {
      -webkit-column-count: 7;
      -webkit-column-gap: 0;
      -moz-column-count: 7;
      -moz-column-gap: 0;
      column-count: 7;
      column-gap: 0;
    }
    [data-grid="7"].masonry li {
      width: 100%;
      float: none;
    }
    [data-grid="7"] li {
      width: 14.28571429%;
      display: inline-block;
    }
    [data-grid="8"].masonry {
      -webkit-column-count: 8;
      -webkit-column-gap: 0;
      -moz-column-count: 8;
      -moz-column-gap: 0;
      column-count: 8;
      column-gap: 0;
    }
    [data-grid="8"].masonry li {
      width: 100%;
      float: none;
    }
    [data-grid="8"] li {
      width: 12.5%;
      display: inline-block;
    }
    @media all and (max-width: 767px) {
      [data-grid]:not(.masonry) li {
        width: 33.333333%;
      }
      [data-grid="2"]:not(.masonry) li {
        width: 50%;
      }
      [data-grid].masonry {
        -webkit-column-count: 1;
        -moz-column-count: 1;
        column-count: 1;
      }
    }
    .background-image-holder {
      will-change: transform, top;
      position: absolute;
      height: 100%;
      top: 0;
      left: 0;
      background-size: cover !important;
      background-position: 50% 50% !important;
      z-index: 0;
      transition: 0.3s linear;
      -webkit-transition: 0.3s linear;
      -moz-transition: 0.3s linear;
      opacity: 0;
      background: #252525;
    }
    .background-image-holder:not([class*='col-']) {
      width: 100%;
    }
    .background-image-holder.background--bottom {
      background-position: 50% 100% !important;
    }
    .background-image-holder.background--top {
      background-position: 50% 0% !important;
    }
    .image--light .background-image-holder {
      background: none;
    }
    .background-image-holder img {
      display: none;
    }
    [data-overlay] {
      position: relative;
    }
    [data-overlay]:before {
      position: absolute;
      content: '';
      background: #252525;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      z-index: 1;
    }
    [data-overlay] *:not(.container):not(.background-image-holder) {
      z-index: 2;
    }
    [data-overlay].image--light:before {
      background: #fff;
    }
    [data-overlay].bg--primary:before {
      background: #4a90e2;
    }
    [data-overlay="1"]:before {
      opacity: 0.1;
    }
    [data-overlay="2"]:before {
      opacity: 0.2;
    }
    [data-overlay="3"]:before {
      opacity: 0.3;
    }
    [data-overlay="4"]:before {
      opacity: 0.4;
    }
    [data-overlay="5"]:before {
      opacity: 0.5;
    }
    [data-overlay="6"]:before {
      opacity: 0.6;
    }
    [data-overlay="7"]:before {
      opacity: 0.7;
    }
    [data-overlay="8"]:before {
      opacity: 0.8;
    }
    [data-overlay="9"]:before {
      opacity: 0.9;
    }
    [data-overlay="10"]:before {
      opacity: 1;
    }
    [data-overlay="0"]:before {
      opacity: 0;
    }
    [data-scrim-bottom] {
      position: relative;
    }
    [data-scrim-bottom]:before {
      position: absolute;
      content: '';
      width: 100%;
      height: 80%;
      background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0%, #252525 100%);
      /* FF3.6+ */
      background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 0)), color-stop(100%, #252525));
      /* Chrome,Safari4+ */
      background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, #252525 100%);
      /* Chrome10+,Safari5.1+ */
      background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 0%, #252525 100%);
      /* Opera 11.10+ */
      background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 0%, #252525 100%);
      /* IE10+ */
      background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, #252525 100%);
      bottom: 0;
      left: 0;
      z-index: 1;
      backface-visibility: hidden;
    }
    [data-scrim-bottom]:not(.image--light) h1,
    [data-scrim-bottom]:not(.image--light) h2,
    [data-scrim-bottom]:not(.image--light) h3,
    [data-scrim-bottom]:not(.image--light) h4,
    [data-scrim-bottom]:not(.image--light) h5,
    [data-scrim-bottom]:not(.image--light) h6 {
      color: #a5a5a5;
      color: #f1f1f1;
    }
    [data-scrim-bottom]:not(.image--light) p,
    [data-scrim-bottom]:not(.image--light) span,
    [data-scrim-bottom]:not(.image--light) ul {
      color: #e6e6e6;
    }
    [data-scrim-bottom].image--light:before {
      background: #fff;
    }
    [data-scrim-bottom="1"]:before {
      opacity: 0.1;
    }
    [data-scrim-bottom="2"]:before {
      opacity: 0.2;
    }
    [data-scrim-bottom="3"]:before {
      opacity: 0.3;
    }
    [data-scrim-bottom="4"]:before {
      opacity: 0.4;
    }
    [data-scrim-bottom="5"]:before {
      opacity: 0.5;
    }
    [data-scrim-bottom="6"]:before {
      opacity: 0.6;
    }
    [data-scrim-bottom="7"]:before {
      opacity: 0.7;
    }
    [data-scrim-bottom="8"]:before {
      opacity: 0.8;
    }
    [data-scrim-bottom="9"]:before {
      opacity: 0.9;
    }
    [data-scrim-bottom="10"]:before {
      opacity: 1;
    }
    [data-scrim-top] {
      position: relative;
    }
    [data-scrim-top]:before {
      position: absolute;
      content: '';
      width: 100%;
      height: 80%;
      background: -moz-linear-gradient(bottom, #252525 0%, rgba(0, 0, 0, 0) 100%);
      /* FF3.6+ */
      background: -webkit-gradient(linear, left bottom, left bottom, color-stop(0%, #252525), color-stop(100%, rgba(0, 0, 0, 0)));
      /* Chrome,Safari4+ */
      background: -webkit-linear-gradient(bottom, #252525 0%, rgba(0, 0, 0, 0) 100%);
      /* Chrome10+,Safari5.1+ */
      background: -o-linear-gradient(bottom, #252525 0%, rgba(0, 0, 0, 0) 100%);
      /* Opera 11.10+ */
      background: -ms-linear-gradient(bottom, #252525 0%, rgba(0, 0, 0, 0) 100%);
      /* IE10+ */
      background: linear-gradient(to bottom, #252525 0%, rgba(0, 0, 0, 0) 100%);
      top: 0;
      left: 0;
      z-index: 1;
    }
    [data-scrim-top]:not(.image--light) h1,
    [data-scrim-top]:not(.image--light) h2,
    [data-scrim-top]:not(.image--light) h3,
    [data-scrim-top]:not(.image--light) h4,
    [data-scrim-top]:not(.image--light) h5,
    [data-scrim-top]:not(.image--light) h6 {
      color: #fff;
    }
    [data-scrim-top]:not(.image--light) p,
    [data-scrim-top]:not(.image--light) span,
    [data-scrim-top]:not(.image--light) ul {
      color: #e6e6e6;
    }
    [data-scrim-top].image--light:before {
      background: #fff;
    }
    [data-scrim-top="1"]:before {
      opacity: 0.1;
    }
    [data-scrim-top="2"]:before {
      opacity: 0.2;
    }
    [data-scrim-top="3"]:before {
      opacity: 0.3;
    }
    [data-scrim-top="4"]:before {
      opacity: 0.4;
    }
    [data-scrim-top="5"]:before {
      opacity: 0.5;
    }
    [data-scrim-top="6"]:before {
      opacity: 0.6;
    }
    [data-scrim-top="7"]:before {
      opacity: 0.7;
    }
    [data-scrim-top="8"]:before {
      opacity: 0.8;
    }
    [data-scrim-top="9"]:before {
      opacity: 0.9;
    }
    [data-scrim-top="10"]:before {
      opacity: 1;
    }
    .imagebg {
      position: relative;
    }
    .imagebg .container {
      z-index: 2;
    }
    .imagebg .container:not(.pos-absolute) {
      position: relative;
    }
    .imagebg:not(.image--light) h1,
    .imagebg:not(.image--light) h2,
    .imagebg:not(.image--light) h3,
    .imagebg:not(.image--light) h4,
    .imagebg:not(.image--light) h5,
    .imagebg:not(.image--light) h6,
    .imagebg:not(.image--light) p,
    .imagebg:not(.image--light) ul,
    .imagebg:not(.image--light) blockquote {
      color: #fff;
    }
    .imagebg:not(.image--light) .bg--white h1,
    .imagebg:not(.image--light) .bg--white h2,
    .imagebg:not(.image--light) .bg--white h3,
    .imagebg:not(.image--light) .bg--white h4,
    .imagebg:not(.image--light) .bg--white h5,
    .imagebg:not(.image--light) .bg--white h6 {
      color: #252525;
    }
    .imagebg:not(.image--light) .bg--white p,
    .imagebg:not(.image--light) .bg--white ul {
      color: #666666;
    }
    div[data-overlay] h1,
    div[data-overlay] h2,
    div[data-overlay] h3,
    div[data-overlay] h4,
    div[data-overlay] h5,
    div[data-overlay] h6 {
      color: #fff;
    }
    div[data-overlay] p,
    div[data-overlay] ul {
      color: #fff;
    }
    .parallax {
      overflow: hidden;
    }
    .parallax .background-image-holder {
      transition: none !important;
      -webkit-transition: none !important;
      -moz-transition: none !important;
    }
    .image--xxs {
      max-height: 1.85714286em;
    }
    .image--xs {
      max-height: 3.71428571em;
    }
    .image--sm {
      max-height: 5.57142857em;
    }
    /**! 06. Buttons **/
    .btn {
      font-family: 'Open Sans', 'Helvetica', 'Arial', sans-serif;
      transition: 0.1s linear;
      -webkit-transition: 0.1s linear;
      -moz-transition: 0.1s linear;
      border-radius: 6px;
      padding-top: 0.46428571em;
      padding-bottom: 0.46428571em;
      padding-right: 2.78571429em;
      padding-left: 2.78571429em;
      border: 1px solid #252525;
      border-width: 1px;
      font-size: inherit;
      line-height: 1.85714286em;
    }
    .btn .btn__text,
    .btn i {
      color: #252525;
      border-color: #252525;
      font-weight: 700;
      font-size: 0.85714286em;
    }
    .btn[class*='col-'] {
      margin-left: 0;
      margin-right: 0;
    }
    .btn:active {
      box-shadow: none;
      -webkit-box-shadow: none;
    }
    .btn.bg--facebook,
    .btn.bg--twitter,
    .btn.bg--instagram,
    .btn.bg--googleplus,
    .btn.bg--pinterest,
    .btn.bg--dribbble,
    .btn.bg--behance,
    .btn.bg--dark {
      border-color: rgba(0, 0, 0, 0) !important;
    }
    .btn.bg--facebook .btn__text,
    .btn.bg--twitter .btn__text,
    .btn.bg--instagram .btn__text,
    .btn.bg--googleplus .btn__text,
    .btn.bg--pinterest .btn__text,
    .btn.bg--dribbble .btn__text,
    .btn.bg--behance .btn__text,
    .btn.bg--dark .btn__text {
      color: #fff;
    }
    .btn.bg--facebook .btn__text i,
    .btn.bg--twitter .btn__text i,
    .btn.bg--instagram .btn__text i,
    .btn.bg--googleplus .btn__text i,
    .btn.bg--pinterest .btn__text i,
    .btn.bg--dribbble .btn__text i,
    .btn.bg--behance .btn__text i,
    .btn.bg--dark .btn__text i {
      color: #fff;
    }
    .btn.bg--facebook:hover,
    .btn.bg--twitter:hover,
    .btn.bg--instagram:hover,
    .btn.bg--googleplus:hover,
    .btn.bg--pinterest:hover,
    .btn.bg--dribbble:hover,
    .btn.bg--behance:hover,
    .btn.bg--dark:hover {
      opacity: .9;
    }
    .btn.bg--error {
      background: #e23636;
      border-color: #e23636 !important;
    }
    .btn.bg--error:hover {
      background: #e54c4c;
      border-color: #e54c4c !important;
      color: #fff !important;
    }
    .btn.bg--error .btn__text {
      color: #fff;
    }
    .btn.bg--error .btn__text i {
      color: #fff;
    }
    @media all and (min-width: 768px) {
      .btn + .btn {
        margin-left: 1.85714286em;
      }
    }
    .btn:first-child {
      margin-left: 0;
    }
    .btn:last-child {
      margin-right: 0;
    }
    .btn--xs {
      padding-top: 0;
      padding-bottom: 0;
      padding-right: 1.39285714em;
      padding-left: 1.39285714em;
    }
    .btn--sm {
      padding-top: 0.30952381em;
      padding-bottom: 0.30952381em;
      padding-right: 1.85714286em;
      padding-left: 1.85714286em;
    }
    .btn--lg {
      padding-top: 0.58035714em;
      padding-bottom: 0.58035714em;
      padding-right: 3.48214286em;
      padding-left: 3.48214286em;
    }
    .btn--lg .btn__text {
      font-size: 1.07142857em;
    }
    .btn--primary,
    .btn--primary:visited {
      background: #4a90e2;
      border-color: #4a90e2;
    }
    .btn--primary .btn__text,
    .btn--primary:visited .btn__text {
      color: #fff;
    }
    .btn--primary .btn__text i,
    .btn--primary:visited .btn__text i {
      color: #fff;
    }
    .btn--primary:hover {
      background: #609de6;
    }
    .btn--primary:active {
      background: #3483de;
    }
    .btn--primary-1,
    .btn--primary-1:visited {
      background: #31639c;
      border-color: #31639c;
    }
    .btn--primary-1 .btn__text,
    .btn--primary-1:visited .btn__text {
      color: #fff;
    }
    .btn--primary-1:hover {
      background: #376faf;
    }
    .btn--primary-1:active {
      background: #2b5789;
    }
    .btn--primary-2,
    .btn--primary-2:visited {
      background: #465773;
      border-color: #465773;
    }
    .btn--primary-2 .btn__text,
    .btn--primary-2:visited .btn__text {
      color: #fff;
    }
    .btn--primary-2:hover {
      background: #506383;
    }
    .btn--primary-2:active {
      background: #3c4b63;
    }
    .btn--secondary {
      background: #fafafa;
      border-color: #fafafa;
    }
    .btn--secondary:hover {
      background: #ffffff;
    }
    .btn--secondary:active {
      background: #f5f5f5;
    }
    .btn--white {
      background: #fff;
      color: #252525;
      border-color: #fff;
    }
    .btn--white i {
      color: #252525;
    }
    .btn--transparent {
      background: none;
      border-color: rgba(0, 0, 0, 0);
      padding-left: 0;
      padding-right: 0;
    }
    .btn--transparent.btn--white .btn__text {
      color: #fff;
    }
    .btn--unfilled {
      background: none;
    }
    .btn--unfilled.btn--white .btn__text {
      color: #fff;
    }
    .btn--unfilled.btn--white i {
      color: #fff;
    }
    .btn--floating {
      position: fixed;
      bottom: 3.71428571em;
      right: 3.71428571em;
      z-index: 10;
    }
    /**! 07. Icons **/
    .icon {
      line-height: 1em;
      font-size: 3.14285714em;
    }
    .icon--xs {
      font-size: 1em;
    }
    .icon--sm {
      font-size: 2.35714286em;
    }
    .icon--lg {
      font-size: 5.57142857em;
    }
    /**! 08. Lists **/
    ul:last-child {
      margin: 0;
    }
    .list-inline li {
      padding: 0 1em;
      margin-left: 0;
    }
    .list-inline li:first-child {
      padding-left: 0;
    }
    .list-inline li:last-child {
      padding-right: 0;
    }
    .list-inline.list-inline--narrow li {
      padding: 0 .5em;
    }
    .list-inline.list-inline--wide li {
      padding: 0 2em;
    }
    /**! 09. Lightbox **/
    .lb-outerContainer {
      border-radius: 0;
    }
    .lb-outerContainer .lb-container {
      padding: 0;
    }
    .lb-outerContainer .lb-container img {
      margin: 0;
    }
    .lightbox-gallery {
      overflow: hidden;
    }
    .lightbox-gallery li {
      float: left;
    }
    .lightbox-gallery li img {
      margin: 0;
      width: 100%;
    }
    .lightbox-gallery.gallery--gaps li {
      padding: 0.46428571em;
    }
    /**! 10. Menus **/
    .menu-horizontal > li:not(:hover) > a,
    .menu-horizontal > li:not(:hover) > span,
    .menu-horizontal > li:not(:hover) > .modal-instance > .modal-trigger {
      opacity: .5;
    }
    .menu-horizontal > li > a,
    .menu-horizontal > li > span,
    .menu-horizontal > li > .modal-instance > .modal-trigger {
      transition: 0.3s ease;
      -webkit-transition: 0.3s ease;
      -moz-transition: 0.3s ease;
      color: #252525;
    }
    .menu-horizontal > li > a:hover,
    .menu-horizontal > li > span:hover,
    .menu-horizontal > li > .modal-instance > .modal-trigger:hover {
      color: #252525;
    }
    .bg--dark .menu-horizontal > li > a,
    .bg--dark .menu-horizontal > li > span {
      color: #fff;
    }
    .bg--dark .menu-horizontal > li > a:hover,
    .bg--dark .menu-horizontal > li > span:hover {
      color: #fff;
    }
    .menu-vertical {
      width: 100%;
    }
    .menu-vertical li {
      width: 100%;
    }
    .menu-vertical li a {
      font-weight: normal;
    }
    @media all and (min-width: 990px) {
      .menu-horizontal {
        display: inline-block;
      }
      .menu-horizontal > li {
        display: inline-block;
      }
      .menu-horizontal > li:not(:last-child) {
        margin-right: 1.85714286em;
      }
      .menu-vertical {
        display: inline-block;
      }
      .menu-vertical li {
        white-space: nowrap;
      }
      .menu-vertical .dropdown__container {
        top: 0;
      }
      .menu-vertical .dropdown__container .dropdown__content:not([class*='bg-']) {
        background: #ffffff;
      }
      .menu-vertical .dropdown__container .dropdown__content {
        transform: translateX(75%);
      }
    }
    /**! 11. Dropdowns **/
    .dropdown {
      position: relative;
    }
    .dropdown .dropdown__container {
      transition: 0.3s ease;
      -webkit-transition: 0.3s ease;
      -moz-transition: 0.3s ease;
      opacity: 0;
      pointer-events: none;
      position: absolute;
      z-index: 999;
    }
    .dropdown .dropdown__container .dropdown__container:before {
      height: 0;
    }
    .dropdown .dropdown__content {
      padding: 1.85714286em;
    }
    .dropdown .dropdown__content:not([class*='col-']) {
      width: 18.57142857em;
    }
    .dropdown .dropdown__content:not([class*='bg-']) {
      background: #ffffff;
    }
    .dropdown .dropdown__content:not([class='bg--dark']) .menu-vertical a {
      color: #666666;
    }
    .dropdown .dropdown__trigger {
      cursor: pointer;
      user-select: none;
    }
    .dropdown.dropdown--active > .dropdown__container {
      opacity: 1;
    }
    .dropdown.dropdown--active > .dropdown__container > .container > .row > .dropdown__content {
      pointer-events: all;
    }
    @media all and (min-width: 991px) {
      .dropdown .dropdown__container:before {
        height: 0.92857143em;
        width: 100%;
        content: '';
        display: block;
      }
      .dropdown .dropdown__content.dropdown__content--md {
        padding: 2.78571429em;
      }
      .dropdown .dropdown__content.dropdown__content--lg {
        padding: 3.71428571em;
      }
      .dropdown .dropdown__content.dropdown__content--xlg {
        padding: 4.64285714em;
      }
    }
    @media all and (max-width: 767px) {
      .dropdown .dropdown__container {
        min-width: 100%;
        position: relative;
        display: none;
      }
      .dropdown .dropdown__content {
        padding: 1.85714286em;
        left: 0 !important;
      }
      .dropdown.dropdown--active > .dropdown__container {
        display: block;
      }
    }
    body.dropdowns--hover .dropdown:not(.dropdown--click):hover > .dropdown__container {
      opacity: 1;
    }
    body.dropdowns--hover .dropdown:not(.dropdown--click):hover > .dropdown__container:before {
      pointer-events: all;
    }
    body.dropdowns--hover .dropdown:not(.dropdown--click):hover > .dropdown__container .dropdown__content {
      pointer-events: all;
    }
    body:not(.dropdowns--hover) .dropdown.dropdown--hover:hover > .dropdown__container {
      opacity: 1;
    }
    body:not(.dropdowns--hover) .dropdown.dropdown--hover:hover > .dropdown__container:before {
      pointer-events: all;
    }
    body:not(.dropdowns--hover) .dropdown.dropdown--hover:hover > .dropdown__container .dropdown__content {
      pointer-events: all;
    }
    @media all and (max-width: 990px) {
      body.dropdowns--hover .dropdown:not(.dropdown--click):hover > .dropdown__container {
        display: block;
      }
      body.dropdowns--hover .dropdown:not(.dropdown--click):hover > .dropdown__container:before {
        pointer-events: all;
      }
    }
    /**! 12. Form Elements **/
    form {
      max-width: 100%;
    }
    form + form {
      margin-top: 30px;
    }
    form:before,
    form:after {
      content: ".";
      display: block;
      height: 0;
      overflow: hidden;
    }
    form:after {
      clear: both;
    }
    label {
      margin: 0;
      font-size: 1.14285714em;
      font-weight: 400;
    }
    input[type],
    textarea,
    select {
      -webkit-appearance: none;
      background: #fcfcfc;
      padding: 0.46428571em;
      border-radius: 6px;
      border: 1px solid #ececec;
    }
    input[type]:focus,
    textarea:focus,
    select:focus {
      outline: none;
    }
    input[type]:active,
    textarea:active,
    select:active {
      outline: none;
    }
    input[type]::-webkit-input-placeholder,
    textarea::-webkit-input-placeholder,
    select::-webkit-input-placeholder {
      color: #b3b3b3;
      font-size: 1.14285714em;
    }
    input[type]:-moz-placeholder,
    textarea:-moz-placeholder,
    select:-moz-placeholder {
      /* Firefox 18- */
      color: #b3b3b3;
      font-size: 1.14285714em;
    }
    input[type]::-moz-placeholder,
    textarea::-moz-placeholder,
    select::-moz-placeholder {
      /* Firefox 19+ */
      color: #b3b3b3;
      font-size: 1.14285714em;
    }
    input[type]:-ms-input-placeholder,
    textarea:-ms-input-placeholder,
    select:-ms-input-placeholder {
      color: #b3b3b3;
      font-size: 1.14285714em;
    }
    input[type="image"] {
      border: none;
      padding: none;
      width: auto;
    }
    textarea {
      display: block;
      width: 100%;
      max-width: 100%;
    }
    select {
      cursor: pointer;
      padding-right: 1.85714286em;
      -webkit-appearance: none;
    }
    select::ms-expand {
      display: none;
    }
    input[type="submit"] {
      background: none;
      outline: none;
      border: none;
      background: #4a90e2;
      padding: 0.46428571em 2.78571429em 0.46428571em 2.78571429em;
      color: #fff;
    }
    @keyframes load {
      0% {
        opacity: 0;
        width: 0;
      }
      50% {
        width: 100%;
        opacity: .8;
        left: 0;
      }
      100% {
        left: 100%;
        opacity: 0;
      }
    }
    button {
      background: none;
    }
    button[type="submit"].btn--loading {
      position: relative;
      overflow: hidden;
      pointer-events: none;
      color: rgba(0, 0, 0, 0);
    }
    button[type="submit"].btn--loading * {
      opacity: 0;
    }
    button[type="submit"].btn--loading:after {
      content: '';
      position: absolute;
      width: 0;
      height: 100%;
      background: #ddd;
      animation: load 1.5s ease-out infinite;
      left: 0;
      top: 0;
    }
    button[type="submit"].btn--loading .btn__text {
      opacity: 0;
    }
    button:focus {
      outline: none !important;
    }
    button.bg--error {
      color: #fff;
    }
    .input-checkbox,
    .input-radio,
    .input-select {
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      display: inline-block;
      cursor: pointer;
    }
    .input-checkbox .inner,
    .input-radio .inner,
    .input-select .inner {
      display: inline-block;
    }
    .input-checkbox input,
    .input-radio input,
    .input-select input {
      display: none;
    }
    .input-checkbox.checked .inner,
    .input-radio.checked .inner,
    .input-select.checked .inner {
      background: #4a90e2;
    }
    .input-checkbox label,
    .input-radio label,
    .input-select label {
      display: block;
    }
    .input-checkbox {
      padding: 0;
    }
    .input-checkbox .inner {
      width: 1.85714286em;
      height: 1.85714286em;
      border-radius: 6px;
      background: #000;
    }
    .input-radio {
      padding: 0;
    }
    .input-radio .inner {
      width: 1.85714286em;
      height: 1.85714286em;
      border-radius: 50%;
      background: #000;
    }
    .input-select {
      position: relative;
    }
    .input-select i {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      -webkit-transform: translateY(-50%);
      right: 1em;
      font-size: .87em;
    }
    .input-file {
      position: relative;
      display: inline-block;
    }
    .input-file input {
      display: none;
    }
    .form-error {
      margin-top: 1.5625em;
      padding: 0.78125em;
      background: #D84D4D;
      color: #fff;
      position: fixed;
      min-width: 350px;
      left: 50%;
      bottom: 1.5625em;
      transform: translate3d(-50%, 0, 0);
      -webkit-transform: translate3d(-50%, 0, 0);
      z-index: 999;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
      box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.1);
    }
    .form-success {
      margin-top: 1.5625em;
      padding: 0.78125em;
      background: #1DC020;
      color: #fff;
      position: fixed;
      min-width: 350px;
      left: 50%;
      bottom: 1.5625em;
      transform: translate3d(-50%, 0, 0);
      -webkit-transform: translate3d(-50%, 0, 0);
      z-index: 999;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
      box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.1);
    }
    .attempted-submit .field-error {
      border-color: #D84D4D !important;
    }
    /**! 13. Accordions **/
    .accordion li .accordion__title,
    .accordion li .accordion__content,
    .accordion li .accordion__content * {
      transition: 0.3s linear;
      -webkit-transition: 0.3s linear;
      -moz-transition: 0.3s linear;
    }
    .accordion li .accordion__title {
      cursor: pointer;
      padding: 0.46428571em 0.92857143em;
      border: 1px solid #ececec;
      border-bottom: none;
      background: none;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    .accordion li:last-child .accordion__title {
      border-bottom: 1px solid #ececec;
    }
    .accordion li .accordion__content {
      opacity: 0;
      visibility: hidden;
      max-height: 0;
    }
    .accordion li .accordion__content > * {
      display: none;
    }
    .accordion li .accordion__content > *:first-child {
      padding-top: 0;
    }
    .accordion li .accordion__content > *:last-child {
      padding-bottom: 0;
    }
    .accordion li.active .accordion__title {
      background: #4a90e2;
      border-bottom: 1px solid #ececec;
    }
    .accordion li.active .accordion__content {
      opacity: 1;
      visibility: visible;
      max-height: 500px;
    }
    .accordion li.active .accordion__content > * {
      display: inline-block;
    }
    /**! 14. Breadcrumbs **/
    .breadcrumb {
      padding: 0;
      margin: 0;
      background: none;
      display: inline-block;
    }
    .breadcrumb li {
      font-size: 1em;
    }
    .breadcrumb li + li:before {
      padding: 0 0.46428571em;
    }
    /**! 15. Pie Charts **/
    .radial {
      position: relative;
    }
    .radial .radial__label {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translateX(-50%) translateY(-50%);
      -webkit-transform: translateX(-50%) translateY(-50%);
      margin-bottom: 0;
    }
    /**! 16. Tabs **/
    .tabs {
      display: block;
      margin-bottom: 0;
    }
    .tabs > li {
      display: inline-block;
      opacity: .5;
      transition: 0.3s ease;
      -webkit-transition: 0.3s ease;
      -moz-transition: 0.3s ease;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    .tabs > .active,
    .tabs:hover {
      opacity: 1;
    }
    .tabs .tab__title {
      cursor: pointer;
    }
    .tabs .tab__title:not(.btn) {
      padding: 0 1.85714286em;
    }
    .tabs li:first-child .tab__title:not(.btn) {
      padding-left: 0;
    }
    .tabs .tab__content {
      display: none;
    }
    .tabs-content {
      margin-top: 1em;
    }
    .tabs-content li > .tab__content {
      width: 100%;
      display: none;
    }
    .tabs-content > .active > .tab__content {
      display: block;
    }
    .tabs-container[data-content-align="left"] .tabs-content {
      text-align: left;
    }
    /**! 17. Boxes **/
    .boxed {
      position: relative;
      overflow: hidden;
      padding: 1.85714286em;
      margin-bottom: 30px;
    }
    .boxed.boxed--lg {
      padding: 2.78571429em;
    }
    .boxed.boxed--sm {
      padding: 1.23809524em;
    }
    .boxed.boxed--border {
      border: 1px solid #ececec;
    }
    .boxed > div[class*='col-']:first-child:not(.boxed) {
      padding-left: 0;
    }
    .boxed > div[class*='col-']:last-child:not(.boxed) {
      padding-right: 0;
    }
    img + .boxed {
      margin-top: -1.85714286em;
    }
    @media all and (max-width: 767px) {
      .boxed {
        padding: 1.23809524em;
        margin-bottom: 15px;
      }
      .boxed.boxed--lg {
        padding: 1.23809524em;
      }
      .boxed div[class*='col-']:not(.boxed) {
        padding: 0;
      }
      .boxed:last-child {
        margin-bottom: 15px;
      }
    }
    /**! 18. Sliders Flickity **/
    .slides:not(.flickity-enabled) li.imagebg:not(:first-child) {
      display: none;
    }
    .slides:not(.flickity-enabled) li.imagebg:first-child {
      background: #252525;
      animation: backgroundLoad .5s ease alternate infinite;
    }
    .slides:not(.flickity-enabled) li.imagebg:first-child .container {
      opacity: 0;
    }
    @keyframes backgroundLoad {
      0% {
        background: #252525;
      }
      100% {
        background: #3f3f3f;
      }
    }
    .slider.height-10 {
      height: auto;
    }
    .slider.height-10 .slides .flickity-slider > li {
      height: 10vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      .slider.height-10 .slides li.imagebg {
        min-height: 10vh;
      }
    }
    .slider.height-20 {
      height: auto;
    }
    .slider.height-20 .slides .flickity-slider > li {
      height: 20vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      .slider.height-20 .slides li.imagebg {
        min-height: 20vh;
      }
    }
    .slider.height-30 {
      height: auto;
    }
    .slider.height-30 .slides .flickity-slider > li {
      height: 30vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      .slider.height-30 .slides li.imagebg {
        min-height: 30vh;
      }
    }
    .slider.height-40 {
      height: auto;
    }
    .slider.height-40 .slides .flickity-slider > li {
      height: 40vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      .slider.height-40 .slides li.imagebg {
        min-height: 40vh;
      }
    }
    .slider.height-50 {
      height: auto;
    }
    .slider.height-50 .slides .flickity-slider > li {
      height: 50vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      .slider.height-50 .slides li.imagebg {
        min-height: 50vh;
      }
    }
    .slider.height-60 {
      height: auto;
    }
    .slider.height-60 .slides .flickity-slider > li {
      height: 60vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      .slider.height-60 .slides li.imagebg {
        min-height: 60vh;
      }
    }
    .slider.height-70 {
      height: auto;
    }
    .slider.height-70 .slides .flickity-slider > li {
      height: 70vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      .slider.height-70 .slides li.imagebg {
        min-height: 70vh;
      }
    }
    .slider.height-80 {
      height: auto;
    }
    .slider.height-80 .slides .flickity-slider > li {
      height: 80vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      .slider.height-80 .slides li.imagebg {
        min-height: 80vh;
      }
    }
    .slider.height-90 {
      height: auto;
    }
    .slider.height-90 .slides .flickity-slider > li {
      height: 90vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      .slider.height-90 .slides li.imagebg {
        min-height: 90vh;
      }
    }
    .slider.height-100 {
      height: auto;
    }
    .slider.height-100 .slides .flickity-slider > li {
      height: 100vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      .slider.height-100 .slides li.imagebg {
        min-height: 100vh;
      }
    }
    .slider .slides .flickity-slider > li:not([class*='col-']) {
      width: 100%;
    }
    .slider .slides .flickity-slider > li .background-image-holder {
      will-change: auto;
    }
    .slider .slides.slides--gapless li[class*='col-'] {
      padding-left: 0;
      padding-right: 0;
    }
    .slider[data-arrows="true"].slider--arrows-hover:not(:hover) .flickity-prev-next-button {
      opacity: 0;
    }
    .slider[data-paging="true"]:not(section) {
      margin-bottom: 3.71428571em;
    }
    .slider[data-paging="true"]:not(section) .flickity-page-dots {
      bottom: -3.71428571em;
    }
    .slider[data-paging="true"]:not([class*='text-']) .flickity-page-dots {
      text-align: center;
    }
    .slider[data-children="1"] .flickity-prev-next-button {
      display: none;
    }
    .slider:not([data-paging="true"]) .slides {
      margin: 0;
    }
    .slider.controls--dark .flickity-page-dots .dot {
      background: #252525;
    }
    .slider.controls--dark .flickity-prev-next-button:before {
      color: #252525;
    }
    section.slider {
      padding: 0;
    }
    section.slider.height-10 {
      height: auto;
    }
    section.slider.height-10 .slides .flickity-slider > li {
      height: 10vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      section.slider.height-10 .slides li.imagebg {
        min-height: 10vh;
      }
    }
    section.slider.height-20 {
      height: auto;
    }
    section.slider.height-20 .slides .flickity-slider > li {
      height: 20vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      section.slider.height-20 .slides li.imagebg {
        min-height: 20vh;
      }
    }
    section.slider.height-30 {
      height: auto;
    }
    section.slider.height-30 .slides .flickity-slider > li {
      height: 30vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      section.slider.height-30 .slides li.imagebg {
        min-height: 30vh;
      }
    }
    section.slider.height-40 {
      height: auto;
    }
    section.slider.height-40 .slides .flickity-slider > li {
      height: 40vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      section.slider.height-40 .slides li.imagebg {
        min-height: 40vh;
      }
    }
    section.slider.height-50 {
      height: auto;
    }
    section.slider.height-50 .slides .flickity-slider > li {
      height: 50vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      section.slider.height-50 .slides li.imagebg {
        min-height: 50vh;
      }
    }
    section.slider.height-60 {
      height: auto;
    }
    section.slider.height-60 .slides .flickity-slider > li {
      height: 60vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      section.slider.height-60 .slides li.imagebg {
        min-height: 60vh;
      }
    }
    section.slider.height-70 {
      height: auto;
    }
    section.slider.height-70 .slides .flickity-slider > li {
      height: 70vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      section.slider.height-70 .slides li.imagebg {
        min-height: 70vh;
      }
    }
    section.slider.height-80 {
      height: auto;
    }
    section.slider.height-80 .slides .flickity-slider > li {
      height: 80vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      section.slider.height-80 .slides li.imagebg {
        min-height: 80vh;
      }
    }
    section.slider.height-90 {
      height: auto;
    }
    section.slider.height-90 .slides .flickity-slider > li {
      height: 90vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      section.slider.height-90 .slides li.imagebg {
        min-height: 90vh;
      }
    }
    section.slider.height-100 {
      height: auto;
    }
    section.slider.height-100 .slides .flickity-slider > li {
      height: 100vh;
      padding: 0;
    }
    @media all and (min-width: 768px) {
      section.slider.height-100 .slides li.imagebg {
        min-height: 100vh;
      }
    }
    section.slider[data-paging="true"] .flickity-page-dots {
      bottom: 1.85714286em;
    }
    section.slider:not(.image--light)[data-paging="true"] .flickity-page-dots .dot {
      background: #fff;
    }
    section.slider .slides {
      margin: 0;
    }
    @media all and (max-width: 767px) {
      section.slider[class*='height-'] .slides .flickity-slider > li {
        height: auto;
        padding: 7.42857143em 0;
      }
      section.slider.space--lg .slides .flickity-slider > li {
        padding: 11.14285714em 0;
      }
      section.slider.space--xlg .slides .flickity-slider > li {
        padding: 11.14285714em 0;
      }
    }
    section.bg--dark .slider[data-paging="true"] .flickity-page-dots .dot,
    section.bg--primary .slider[data-paging="true"] .flickity-page-dots .dot {
      background: #fff;
    }
    .flickity-page-dots .dot {
      transition: 0.3s ease;
      -webkit-transition: 0.3s ease;
      -moz-transition: 0.3s ease;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #252525;
      border: none;
      margin: 0 0.46428571em;
    }
    .flickity-page-dots .dot:hover:not(.is-selected) {
      opacity: .6;
    }
    .text-center .flickity-page-dots,
    section.slider .flickity-page-dots {
      text-align: center;
    }
    .flickity-prev-next-button svg {
      display: none;
    }
    .flickity-prev-next-button:before {
      font-family: 'stack-interface';
      content: "\e80c";
      font-size: 1em;
      font-weight: normal;
    }
    .flickity-prev-next-button.previous:before {
      content: "\e80b";
    }
    .imagebg:not(.image--light) .flickity-page-dots .dot,
    .bg--dark .flickity-page-dots .dot {
      background: #fff;
    }
    /**! 19. Hover Elements **/
    .hover-element {
      position: relative;
      overflow: hidden;
      margin-bottom: 30px;
    }
    .hover-element * {
      transition: 0.3s ease;
      -webkit-transition: 0.3s ease;
      -moz-transition: 0.3s ease;
    }
    .hover-element .hover-element__reveal {
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
      width: 100%;
      height: 100%;
    }
    .hover-element .hover-element__reveal .boxed {
      height: 100%;
    }
    .hover-element:hover .hover-element__reveal,
    .hover-element.hover--active .hover-element__reveal {
      opacity: 1;
    }
    .hover-element img {
      margin-bottom: 0;
    }
    @media all and (max-width: 1024px) {
      .hover-element {
        cursor: pointer;
      }
    }
    .row:last-child div[class*='col-']:last-child .hover-element {
      margin-bottom: 0;
    }
    /**! 20. Masonry **/
    .masonry .masonry__container.masonry--active .masonry__item {
      opacity: 1;
      pointer-events: initial;
    }
    .masonry .masonry__container .masonry__item {
      opacity: 0;
      pointer-events: none;
    }
    .masonry .masonry__filters li {
      display: inline-block;
      cursor: pointer;
      text-transform: capitalize;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    .masonry .masonry__filters li.active {
      cursor: default;
    }
    .masonry.masonry--gapless .masonry__item {
      padding: 0 !important;
      margin-bottom: 0;
    }
    /**! 21. Modals **/
    .modal-instance .modal-body {
      display: none;
    }
    .modal-container {
      transition: 0.3s linear;
      -webkit-transition: 0.3s linear;
      -moz-transition: 0.3s linear;
      padding: 0;
      visibility: hidden;
      opacity: 0;
      z-index: -1;
      position: fixed;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
    }
    .modal-container.modal-active {
      opacity: 1;
      visibility: visible;
      z-index: 999;
    }
    .modal-container:before {
      background: rgba(0, 0, 0, 0.85);
      content: '';
      position: fixed;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      z-index: 1;
    }
    .modal-container .modal-content {
      backface-visibility: hidden;
      position: fixed;
      z-index: 2;
      top: 50%;
      left: 50%;
      max-height: 100%;
      overflow-y: scroll;
      border: none;
      transform: translate3d(-50%, -50%, 0);
      -webkit-transform: translate3d(-50%, -50%, 0);
      padding: 0;
      border-radius: 0;
      box-shadow: none;
    }
    .modal-container .modal-content:not(.height--natural) {
      width: 50%;
      height: 50%;
    }
    .modal-container .modal-content .modal-close-cross {
      cursor: pointer;
      position: absolute;
      opacity: .5;
      transition: 0.1s linear;
      -webkit-transition: 0.1s linear;
      -moz-transition: 0.1s linear;
      top: 1em;
      right: 1em;
      z-index: 99;
    }
    .modal-container .modal-content .modal-close-cross:before {
      content: '\00D7';
      font-size: 1.5em;
    }
    .modal-container .modal-content .modal-close-cross:hover {
      opacity: 1;
    }
    .modal-container .modal-content.imagebg:not(.image--light) .modal-close-cross:before {
      color: #fff;
    }
    .modal-container .modal-content iframe {
      width: 100%;
      outline: none;
      border: none;
      height: 100%;
      backface-visibility: hidden;
    }
    .modal-container .modal-content iframe:first-child + .modal-close-cross:last-child {
      top: -3.71428571em;
    }
    @media all and (max-width: 767px) {
      .modal-container .modal-content {
        width: 97% !important;
        height: auto !important;
        padding-top: 2em;
        padding-bottom: 2em;
      }
    }
    /**! 22. Maps **/
    .map-container {
      position: relative;
      overflow: hidden;
    }
    .map-container iframe,
    .map-container .map-canvas {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
    }
    /**! 23. Parallax **/
    .parallax > .background-image-holder,
    .parallax .slides li > .background-image-holder {
      height: 100%;
      min-height: 100vh;
      top: -50vh;
      transition: opacity 0.3s ease !important;
      -webkit-transition: opacity 0.3s ease !important;
      -webkit-transform-style: preserve-3d;
    }
    .parallax:first-child .slides li > .background-image-holder,
    .parallax:first-child .background-image-holder {
      top: 0;
    }
    .main-container > a:first-child + .parallax .background-image-holder {
      top: 0;
    }
    @media all and (max-width: 1024px) {
      .parallax > .background-image-holder,
      .parallax .slides li > .background-image-holder {
        top: 0 !important;
        transform: none !important;
        -webkit-transform: none !important;
        height: 100%;
      }
    }
    .parallax {
      will-change: contents;
    }
    /**! 24. Notifications **/
    .notification {
      max-width: 100%;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
      position: fixed;
      z-index: 99;
      pointer-events: none;
      padding: 0;
      margin: 1em;
      opacity: 0;
      transition: 0.3s linear;
      -webkit-transition: 0.3s linear;
      -moz-transition: 0.3s linear;
    }
    .notification:not([class*='bg-']) {
      background: #fff;
    }
    .notification[class*='col-'] {
      min-width: 400px;
    }
    .notification .notification-close-cross {
      position: absolute;
      top: 1em;
      z-index: 99;
      right: 1em;
      cursor: pointer;
      transition: 0.1s linear;
      -webkit-transition: 0.1s linear;
      -moz-transition: 0.1s linear;
      opacity: .7;
    }
    .notification .notification-close-cross:before {
      content: '\00D7';
      font-size: 1.5em;
    }
    .notification .notification-close-cross:hover {
      opacity: 1;
    }
    .notification.notification--reveal {
      z-index: 99;
      pointer-events: initial;
    }
    .notification.notification--reveal[data-animation="from-bottom"] {
      animation: from-bottom 0.3s linear 0s forwards;
      -webkit-animation: from-bottom 0.3s linear 0s forwards;
      -moz-animation: from-bottom 0.3s linear 0s forwards;
    }
    .notification.notification--reveal[data-animation="from-top"] {
      animation: from-top 0.3s linear 0s forwards;
      -webkit-animation: from-top 0.3s linear 0s forwards;
      -moz-animation: from-top 0.3s linear 0s forwards;
    }
    .notification.notification--reveal[data-animation="from-left"] {
      animation: from-left 0.3s linear 0s forwards;
      -webkit-animation: from-left 0.3s linear 0s forwards;
      -moz-animation: from-left 0.3s linear 0s forwards;
    }
    .notification.notification--reveal[data-animation="from-right"] {
      animation: from-right 0.3s linear 0s forwards;
      -webkit-animation: from-right 0.3s linear 0s forwards;
      -moz-animation: from-right 0.3s linear 0s forwards;
    }
    .notification.notification--dismissed {
      animation: fade-out 0.4s linear 0s forwards !important;
      -webkit-animation: fade-out 0.4s linear 0s forwards !important;
      -moz-animation: fade-out 0.4s linear 0s forwards !important;
      pointer-events: none;
    }
    .bg--dark + .notification-close-cross:before {
      color: #fff;
    }
    a[data-notification-link] {
      text-decoration: none;
    }
    a[data-notification-link]:hover {
      text-decoration: none;
    }
    @media all and (max-width: 767px) {
      .notification[class*='col-'] {
        min-width: 0;
      }
    }
    @keyframes from-bottom {
      from {
        transform: translate3d(0, 100%, 0);
        -webkit-transform: translate3d(0, 100%, 0);
        opacity: 0;
      }
      to {
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        opacity: 1;
      }
    }
    @-moz-keyframes from-bottom {
      from {
        transform: translate3d(0, 100%, 0);
        -webkit-transform: translate3d(0, 100%, 0);
        opacity: 0;
      }
      to {
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        opacity: 1;
      }
    }
    @-webkit-keyframes from-bottom {
      from {
        transform: translate3d(0, 100%, 0);
        -webkit-transform: translate3d(0, 100%, 0);
        opacity: 0;
      }
      to {
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        opacity: 1;
      }
    }
    @keyframes from-top {
      from {
        transform: translate3d(0, -100%, 0);
        -webkit-transform: translate3d(0, -100%, 0);
        opacity: 0;
      }
      to {
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        opacity: 1;
      }
    }
    @-moz-keyframes from-top {
      from {
        transform: translate3d(0, -100%, 0);
        -webkit-transform: translate3d(0, -100%, 0);
        opacity: 0;
      }
      to {
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        opacity: 1;
      }
    }
    @-webkit-keyframes from-top {
      from {
        transform: translate3d(0, -100%, 0);
        -webkit-transform: translate3d(0, -100%, 0);
        opacity: 0;
      }
      to {
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        opacity: 1;
      }
    }
    @keyframes from-left {
      from {
        transform: translate3d(-100%, 0, 0);
        -webkit-transform: translate3d(-100%, 0, 0);
        opacity: 0;
      }
      to {
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        opacity: 1;
      }
    }
    @-moz-keyframes from-left {
      from {
        transform: translate3d(-100%, 0, 0);
        -webkit-transform: translate3d(-100%, 0, 0);
        opacity: 0;
      }
      to {
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        opacity: 1;
      }
    }
    @-webkit-keyframes from-left {
      from {
        transform: translate3d(-100%, 0, 0);
        -webkit-transform: translate3d(-100%, 0, 0);
        opacity: 0;
      }
      to {
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        opacity: 1;
      }
    }
    @keyframes from-right {
      from {
        transform: translate3d(100%, 0, 0);
        -webkit-transform: translate3d(100%, 0, 0);
        opacity: 1;
      }
      to {
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        opacity: 1;
      }
    }
    @-moz-keyframes from-right {
      from {
        transform: translate3d(100%, 0, 0);
        -webkit-transform: translate3d(100%, 0, 0);
        opacity: 0;
      }
      to {
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        opacity: 1;
      }
    }
    @-webkit-keyframes from-right {
      from {
        transform: translate3d(100%, 0, 0);
        -webkit-transform: translate3d(100%, 0, 0);
        opacity: 0;
      }
      to {
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        opacity: 1;
      }
    }
    @keyframes fade-out {
      0% {
        opacity: 1;
      }
      100% {
        opacity: 0;
      }
    }
    @-webkit-keyframes fade-out {
      0% {
        opacity: 1;
      }
      100% {
        opacity: 0;
      }
    }
    @-moz-keyframes fade-out {
      0% {
        opacity: 1;
      }
      100% {
        opacity: 0;
      }
    }
    /**! 25. Video **/
    iframe {
      width: 100%;
      min-height: 350px;
      border: none;
    }
    @media all and (max-width: 767px) {
      iframe {
        min-height: 220px;
      }
    }
    .videobg {
      background: #252525;
      position: relative;
      overflow: hidden;
    }
    .videobg .container,
    .videobg .background-image-holder {
      opacity: 0;
      transition: 0.3s linear;
      -webkit-transition: 0.3s linear;
      -moz-transition: 0.3s linear;
    }
    .videobg .background-image-holder {
      opacity: 0 !important;
    }
    .videobg.video-active .container {
      opacity: 1;
    }
    .videobg.video-active .loading-indicator {
      opacity: 0;
      visibility: hidden;
    }
    .videobg video {
      object-fit: cover;
      height: 100%;
      min-width: 100%;
      position: absolute;
      top: 0;
      z-index: 0 !important;
      left: 0;
    }
    @media all and (max-width: 1024px) {
      .videobg .background-image-holder,
      .videobg .container {
        opacity: 1 !important;
      }
      .videobg .loading-indicator {
        display: none;
      }
      .videobg video {
        display: none;
      }
    }
    .youtube-background {
      position: absolute;
      height: 100%;
      width: 100%;
      top: 0;
      z-index: 0 !important;
    }
    .youtube-background .mb_YTPBar {
      opacity: 0;
      height: 0;
      visibility: hidden;
    }
    @media all and (max-width: 1024px) {
      .youtube-background {
        display: none;
      }
    }
    .loading-indicator {
      position: absolute !important;
      top: 50%;
      left: 50%;
      z-index: 99 !important;
      width: 50px;
      height: 50px;
      margin-top: -25px;
      margin-left: -25px;
      background-color: #fff;
      border-radius: 100%;
      -webkit-animation: loading-spinner 1s infinite ease-in-out;
      animation: loading-spinner 1s infinite ease-in-out;
      transition: 0.3s linear;
      -webkit-transition: 0.3s linear;
      -moz-transition: 0.3s linear;
    }
    @-webkit-keyframes loading-spinner {
      0% {
        -webkit-transform: scale(0);
      }
      100% {
        -webkit-transform: scale(1);
        opacity: 0;
      }
    }
    @keyframes loading-spinner {
      0% {
        -webkit-transform: scale(0);
        transform: scale(0);
      }
      100% {
        -webkit-transform: scale(1);
        transform: scale(1);
        opacity: 0;
      }
    }
    .video-cover {
      position: relative;
    }
    .video-cover video {
      max-width: 100%;
    }
    .video-cover iframe {
      background: #252525;
    }
    .video-cover .background-image-holder {
      z-index: 3;
    }
    .video-cover .video-play-icon {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate3d(-50%, -50%, 0);
      -webkit-transform: translate3d(-50%, -50%, 0);
    }
    .video-cover .video-play-icon,
    .video-cover .background-image-holder {
      transition: 0.3s linear;
      -webkit-transition: 0.3s linear;
      -moz-transition: 0.3s linear;
    }
    .video-cover.reveal-video .video-play-icon,
    .video-cover.reveal-video .background-image-holder {
      opacity: 0 !important;
      pointer-events: none;
    }
    .video-cover[data-scrim-bottom]:before,
    .video-cover[data-overlay]:before,
    .video-cover[data-scrim-top]:before {
      transition: 0.3s linear;
      -webkit-transition: 0.3s linear;
      -moz-transition: 0.3s linear;
      z-index: 4;
    }
    .video-cover.reveal-video[data-scrim-bottom]:before,
    .video-cover.reveal-video[data-overlay]:before,
    .video-cover.reveal-video[data-scrim-top]:before {
      opacity: 0;
      pointer-events: none;
    }
    .video-play-icon {
      width: 7.42857143em;
      height: 7.42857143em;
      border-radius: 50%;
      position: relative;
      z-index: 4;
      display: inline-block;
      border: 2px solid #ffffff;
      cursor: pointer;
      background: #ffffff;
    }
    .video-play-icon.video-play-icon--sm {
      width: 3.71428571em;
      height: 3.71428571em;
    }
    .video-play-icon.video-play-icon--sm:before {
      border-width: 4px 0 4px 9px;
    }
    .video-play-icon.video-play-icon--xs {
      width: 1.85714286em;
      height: 1.85714286em;
    }
    .video-play-icon.video-play-icon--xs:before {
      border-width: 3px 0 3px 6px;
      margin-left: -3px;
    }
    .video-play-icon.bg--primary:before {
      border-color: transparent transparent transparent #fff;
    }
    .video-play-icon:before {
      position: absolute;
      top: 50%;
      margin-top: -5px;
      left: 50%;
      margin-left: -4px;
      content: '';
      width: 0;
      height: 0;
      border-style: solid;
      border-width: 6px 0 6px 12px;
      border-color: transparent transparent transparent #ffffff;
      border-color: transparent transparent transparent #808080;
    }
    .video-play-icon.video-play-icon--dark {
      border-color: #252525;
      background: #252525;
    }
    .video-play-icon.video-play-icon--dark:before {
      border-color: transparent transparent transparent #252525;
    }
    .video-play-icon.video-play-icon--dark:before {
      border-color: transparent transparent transparent #fff;
    }
    @media all and (max-width: 767px) {
      .video-play-icon {
        width: 4.95238095em;
        height: 4.95238095em;
      }
    }
    div[class*='col-'][class*='-12']:not([class*='xs-12']) .video-cover iframe {
      min-height: 550px;
    }
    @media all and (max-width: 990px) {
      div[class*='col-'][class*='-12']:not([class*='xs-12']) .video-cover iframe {
        min-height: 350px;
      }
    }
    div[class*='col-'][class*='-10'] .video-cover iframe {
      min-height: 450px;
    }
    div[class*='col-'][class*='-8'] .video-cover iframe {
      min-height: 400px;
    }
    div[class*='col-'][class*='-6'] .video-cover iframe {
      min-height: 350px;
    }
    @media all and (max-width: 1200px) {
      div[class*='col-'][class*='-6'] .video-cover iframe {
        min-height: 300px;
      }
    }
    @media all and (max-width: 990px) {
      div[class*='col-'][class*='-6'] .video-cover iframe {
        min-height: 220px;
      }
    }
    @media all and (max-width: 767px) {
      div[class*='col-'] .video-cover iframe {
        min-height: 220px !important;
      }
    }
    .modal-container video {
      max-width: 100%;
    }
    /**! 26. Colors **/
    body {
      background: #ffffff;
    }
    .color--primary {
      color: #4a90e2 !important;
    }
    a {
      color: #4a90e2;
    }
    .color--primary-1 {
      color: #31639c !important;
    }
    .color--primary-2 {
      color: #465773 !important;
    }
    .color--white {
      color: #fff;
    }
    .color--dark {
      color: #252525;
    }
    .bg--dark {
      background: #252525;
    }
    .bg--dark:not(.nav-bar):not(.bar) {
      color: #ffffff;
    }
    .bg--dark:not(.nav-bar):not(.bar) h1,
    .bg--dark:not(.nav-bar):not(.bar) h2,
    .bg--dark:not(.nav-bar):not(.bar) h3,
    .bg--dark:not(.nav-bar):not(.bar) h4,
    .bg--dark:not(.nav-bar):not(.bar) h5,
    .bg--dark:not(.nav-bar):not(.bar) h6,
    .bg--dark:not(.nav-bar):not(.bar) i,
    .bg--dark:not(.nav-bar):not(.bar) span:not(.btn__text),
    .bg--dark:not(.nav-bar):not(.bar) p {
      color: #ffffff;
    }
    .bg--dark:not(.nav-bar):not(.bar) a:not(.btn) {
      color: #fff;
    }
    .bg--site {
      background: #ffffff;
    }
    .bg--secondary {
      background: #fafafa;
    }
    .bg--primary {
      background: #4a90e2;
    }
    .bg--primary p,
    .bg--primary span,
    .bg--primary ul,
    .bg--primary a:not(.btn) {
      color: #fff;
    }
    .bg--primary h1,
    .bg--primary h2,
    .bg--primary h3,
    .bg--primary h4,
    .bg--primary h5,
    .bg--primary h6,
    .bg--primary i {
      color: #fff;
    }
    .bg--white {
      background: #fff;
    }
    .bg--white p,
    .bg--white span,
    .bg--white ul,
    .bg--white a:not(.btn) {
      color: #666666;
    }
    .bg--white h1,
    .bg--white h2,
    .bg--white h3,
    .bg--white h4,
    .bg--white h5,
    .bg--white h6,
    .bg--white i {
      color: #252525;
    }
    .bg--error {
      background: #e23636;
    }
    .imagebg:not(.image--light) .bg--white p,
    .imagebg:not(.image--light) .bg--white span,
    .imagebg:not(.image--light) .bg--white ul,
    .imagebg:not(.image--light) .bg--white a:not(.btn) {
      color: #666666;
    }
    .imagebg:not(.image--light) .bg--white h1,
    .imagebg:not(.image--light) .bg--white h2,
    .imagebg:not(.image--light) .bg--white h3,
    .imagebg:not(.image--light) .bg--white h4,
    .imagebg:not(.image--light) .bg--white h5,
    .imagebg:not(.image--light) .bg--white h6,
    .imagebg:not(.image--light) .bg--white i {
      color: #252525;
    }
    .imagebg:not(.image--light) .bg--secondary {
      background: rgba(250, 250, 250, 0.2);
    }
    .bg--primary-1 {
      background: #31639c;
    }
    .bg--primary-1 p,
    .bg--primary-1 span,
    .bg--primary-1 ul,
    .bg--primary-1 a:not(.btn) {
      color: #fff;
    }
    .bg--primary-1 h1,
    .bg--primary-1 h2,
    .bg--primary-1 h3,
    .bg--primary-1 h4,
    .bg--primary-1 h5,
    .bg--primary-1 h6,
    .bg--primary-1 i {
      color: #fff;
    }
    .bg--primary-2 {
      background: #465773;
    }
    .bg--primary-2 p,
    .bg--primary-2 span,
    .bg--primary-2 ul,
    .bg--primary-2 a:not(.btn) {
      color: #fff;
    }
    .bg--primary-2 h1,
    .bg--primary-2 h2,
    .bg--primary-2 h3,
    .bg--primary-2 h4,
    .bg--primary-2 h5,
    .bg--primary-2 h6,
    .bg--primary-2 i {
      color: #fff;
    }
    .image-bg:not(.image-light) *:not(a) {
      color: #fff;
    }
    .color--facebook {
      color: #3b5998;
    }
    .color--twitter {
      color: #00aced;
    }
    .color--googleplus {
      color: #dd4b39;
    }
    .color--instagram {
      color: #125688;
    }
    .color--pinterest {
      color: #cb2027;
    }
    .color--dribbble {
      color: #ea4c89;
    }
    .color--behance {
      color: #053eff;
    }
    .bg--facebook {
      background: #3b5998;
      color: #fff;
    }
    .bg--twitter {
      background: #00aced;
      color: #fff;
    }
    .bg--googleplus {
      background: #dd4b39;
      color: #fff;
    }
    .bg--instagram {
      background: #125688;
      color: #fff;
    }
    .bg--pinterest {
      background: #cb2027;
      color: #fff;
    }
    .bg--dribbble {
      background: #ea4c89;
      color: #fff;
    }
    .bg--behance {
      background: #053eff;
      color: #fff;
    }
    /**! 27. Image Blocks **/
    .imageblock {
      position: relative;
      padding: 0;
    }
    .imageblock > .container,
    .imageblock > div[class*='col-']:not(.imageblock__content) {
      padding-top: 7.42857143em;
      padding-bottom: 7.42857143em;
      float: none;
      overflow: hidden;
    }
    .imageblock.imageblock--lg > .container,
    .imageblock.imageblock--lg > div[class*='col-']:not(.imageblock__content) {
      padding-top: 9.28571429em;
      padding-bottom: 9.28571429em;
      float: none;
      overflow: hidden;
    }
    .imageblock .imageblock__content {
      position: absolute;
      height: 100%;
      top: 0;
      z-index: 2;
      padding: 0;
    }
    .imageblock .imageblock__content .slider {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
    }
    .imageblock .imageblock__content .slider .slides > li {
      padding: 0;
      min-height: 100%;
      position: absolute !important;
    }
    .imageblock.allow-overflow .imageblock__content {
      overflow: visible;
    }
    @media all and (max-width: 767px) {
      .imageblock[class*='space-'] {
        padding-bottom: 0;
        padding-top: 0;
      }
      .imageblock .imageblock__content {
        position: relative;
        min-height: 18.57142857em;
      }
      .imageblock > .container,
      .imageblock > div[class*='col-']:not(.imageblock__content) {
        padding-top: 5.57142857em;
        padding-bottom: 5.57142857em;
        float: none;
        overflow: hidden;
      }
      .imageblock.imageblock--lg > .container,
      .imageblock.imageblock--lg > div[class*='col-']:not(.imageblock__content) {
        padding-top: 5.57142857em;
        padding-bottom: 5.57142857em;
        float: none;
        overflow: hidden;
      }
    }
    /**! 28. MailChimp & Campaign Monitor **/
    form[action*='createsend.com'] * {
      transition: 0.3s linear;
      -webkit-transition: 0.3s linear;
      -moz-transition: 0.3s linear;
      opacity: 0;
    }
    form[action*='createsend.com'].form--active * {
      opacity: 1;
    }
    form[action*='createsend.com'] .input-checkbox + br {
      display: none;
    }
    form[action*='createsend.com'].no-labels label {
      display: none;
    }
    form[action*='createsend.com'] br {
      display: none;
    }
    form[action*='createsend.com'] p > label:first-child {
      margin-bottom: 0.92857143em;
    }
    form[action*='list-manage.com'] h2 {
      font-family: 'Open Sans', 'Helvetica', 'Arial', sans-serif;
      color: #252525;
      font-weight: 300;
      font-variant-ligatures: common-ligatures;
      margin-top: 0;
      margin-bottom: 0;
      font-size: 1.35714286em;
      line-height: 1.68421053em;
      margin-bottom: 1.36842105263158em;
      font-weight: 400;
    }
    form[action*='list-manage.com'] h2.inline-block + .h4.inline-block:not(.typed-text) {
      margin-left: 0.68421052631579em;
    }
    form[action*='list-manage.com'] .input-group ul {
      overflow: hidden;
    }
    form[action*='list-manage.com'] .input-group ul li {
      float: left;
    }
    form[action*='list-manage.com'] * {
      transition: 0.3s linear;
      -webkit-transition: 0.3s linear;
      -moz-transition: 0.3s linear;
      opacity: 0;
    }
    form[action*='list-manage.com'].form--active * {
      opacity: 1;
    }
    form[action*='list-manage.com'].no-labels label {
      display: none;
    }
    form[action*='list-manage.com'] .small-meta {
      font-size: 0.5em;
    }
    /**! 29. Twitter **/
    .twitter-feed .user {
      display: none;
    }
    .twitter-feed .interact {
      display: none;
    }
    .twitter-feed .timePosted {
      font-size: .87em;
    }
    /**! 30. Transitions **/
    [class*='transition--'] {
      transition: 0.3s ease;
      -webkit-transition: 0.3s ease;
      -moz-transition: 0.3s ease;
      opacity: 0;
    }
    [class*='transition--'].transition--active {
      opacity: 1;
    }
    .transition--scale {
      transform: scale(0.98);
      -webkit-transform: scale(0.98);
    }
    .transition--scale.transition--active {
      opacity: 1;
      transform: scale(1);
      -webkit-transform: scale(1);
    }
    .transition--slide {
      transform: translate3d(200px, 0, 0);
      -webkit-transform: translate3d(200px, 0, 0);
      transform: translate3d(30vw, 0, 0);
      -webkit-transform: translate3d(30vw, 0, 0);
    }
    .transition--slide.transition--active {
      transform: translate3d(0, 0, 0);
      -webkit-transform: translate3d(0, 0, 0);
    }
    /**! 31. Switchable Sections **/
    .switchable {
      position: relative;
    }
    .switchable div[class*='col-']:first-child {
      float: left;
      right: auto;
    }
    .switchable div[class*='col-']:first-child:not([class*='pull']):not([class*='push']) {
      left: 0;
    }
    .switchable div[class*='col-']:last-child {
      float: right;
      left: auto;
    }
    .switchable div[class*='col-']:last-child:not([class*='pull']):not([class*='push']) {
      right: 0;
    }
    .switchable.switchable--switch div[class*='col-']:first-child {
      float: right;
      right: 0;
      left: auto;
    }
    .switchable.switchable--switch div[class*='col-']:first-child:not([class*='pull']):not([class*='push']) {
      left: auto;
    }
    .switchable.switchable--switch div[class*='col-']:last-child {
      float: left;
      left: 0;
      right: auto;
    }
    .switchable .switchable__text {
      margin-top: 3.71428571em;
    }
    .switchable > div[class*='col-'] {
      padding: 0;
    }
    /**! 32. Typed Effect **/
    .typed-text {
      display: inline-block;
    }
    .typed-text.typed-text--cursor:after {
      content: '|';
      font-size: 1.2em;
      -webkit-animation: blink 0.7s infinite;
      animation: blink 0.7s infinite;
      position: relative;
      right: 6px;
    }
    @keyframes blink {
      0% {
        opacity: 1;
      }
      50% {
        opacity: 0;
      }
      100% {
        opacity: 1;
      }
    }
    @-webkit-keyframes blink {
      0% {
        opacity: 1;
      }
      50% {
        opacity: 0;
      }
      100% {
        opacity: 1;
      }
    }
    /**! 33. Gradient BG **/
    [data-gradient-bg] {
      position: relative;
    }
    [data-gradient-bg] > canvas {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
    }
    [data-gradient-bg] > canvas + .background-image-holder {
      opacity: .2 !important;
    }

    /**! 36. Helper Classes **/
    .clearfix {
      overflow: hidden;
    }
    .allow-overflow {
      overflow: visible;
    }
    .container .row--gapless {
      padding-left: 15px;
      padding-right: 15px;
    }
    .container .row--gapless > div[class*='col-'] {
      padding: 0;
    }
    @media all and (max-width: 767px) {
      .text-left-xs {
        text-align: left;
      }
    }
    @media all and (max-width: 991px) {
      .text-left-sm {
        text-align: left;
      }
    }
    section > .row--gapless {
      padding-left: 0;
      padding-right: 0;
    }
    section > .row--gapless > div[class*='col-'] {
      padding: 0;
    }
    div.right {
      float: right;
    }
    div.left {
      float: left;
    }
    section.text-right > .container:last-child > .row:only-child > div[class*='col-']:only-child {
      float: right;
    }
    /**! 37. Spacing **/
    section,
    footer {
      padding-top: 7.42857143em;
      padding-bottom: 7.42857143em;
    }
    section.space--xxs,
    footer.space--xxs {
      padding-top: 1.85714286em;
      padding-bottom: 1.85714286em;
    }
    section.space--xs,
    footer.space--xs {
      padding-top: 3.71428571em;
      padding-bottom: 3.71428571em;
    }
    section.space--sm,
    footer.space--sm {
      padding-top: 4.95238095em;
      padding-bottom: 4.95238095em;
    }
    section.space--md,
    footer.space--md {
      padding-top: 11.14285714em;
      padding-bottom: 11.14285714em;
    }
    section.space--lg,
    footer.space--lg {
      padding-top: 14.85714286em;
      padding-bottom: 14.85714286em;
    }
    section.space--xlg,
    footer.space--xlg {
      padding-top: 29.71428571em;
      padding-bottom: 29.71428571em;
    }
    section.space--0,
    footer.space--0 {
      padding: 0;
    }
    section.section--even,
    footer.section--even {
      padding-top: 7.42857143em;
      padding-bottom: 7.42857143em;
    }
    section.space-bottom--sm,
    footer.space-bottom--sm {
      padding-bottom: 4.95238095em;
    }
    @media all and (max-width: 767px) {
      section,
      footer,
      section.section--even {
        padding: 5.57142857em 0;
      }
      section.space--lg,
      footer.space--lg,
      section.section--even.space--lg,
      section.space--md,
      footer.space--md,
      section.section--even.space--md {
        padding: 5.57142857em 0;
      }
      section.space--xlg,
      footer.space--xlg,
      section.section--even.space--xlg {
        padding: 8.35714286em 0;
      }
    }
    div[class*='col-'] > div[class*='col-']:first-child {
      padding-left: 0;
    }
    div[class*='col-'] > div[class*='col-']:last-child {
      padding-right: 0;
    }
    @media all and (max-width: 767px) {
      .col-xs-6:nth-child(odd) {
        padding-right: 7.5px;
      }
      .col-xs-6:nth-child(even) {
        padding-left: 7.5px;
      }
    }
    @media all and (min-width: 768px) {
      .mt--1 {
        margin-top: 1.85714286em;
      }
      .mt--2 {
        margin-top: 3.71428571em;
      }
      .mt--3 {
        margin-top: 5.57142857em;
      }
      .mb--1 {
        margin-bottom: 1.85714286em;
      }
      .mb--2 {
        margin-bottom: 3.71428571em;
      }
      .mb--3 {
        margin-bottom: 5.57142857em;
      }
    }
    @media all and (max-width: 990px) {
      .mt--1,
      .mt--2 {
        margin-top: 1.85714286em;
      }
      .mt--3 {
        margin-top: 2.78571429em;
      }
    }
    .unpad {
      padding: 0;
    }
    .unpad--bottom {
      padding-bottom: 0;
    }
    .unpad--top {
      padding-top: 0;
    }
    section.unpad--bottom {
      padding-bottom: 0;
    }
    section.unpad {
      padding: 0;
    }
    section.unpad--top {
      padding-top: 0;
    }
    .unmarg--bottom {
      margin-bottom: 0;
    }
    .unmarg {
      margin: 0;
    }
    .unmarg--top {
      margin-top: 0;
    }

    /**! 40. Theme Overrides **/
    /*! -- Stack Customizers -- */
    .box-shadow {
      box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.04);
    }
    .box-shadow-shallow {
      box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.06);
    }
    .box-shadow-wide {
      box-shadow: 0 23px 40px rgba(0, 0, 0, 0.2);
    }
    .border--round {
      border-radius: 6px;
    }
    .border--round:before {
      border-radius: 6px;
    }
    .border--round .background-image-holder {
      border-radius: 6px;
    }
    .border--round [data-scrim-top]:before,
    .border--round [data-scrim-bottom]:before,
    .border--round [data-overlay]:before {
      border-radius: 6px;
    }
    .imageblock.border--round .background-image-holder {
      border-radius: 6px 0 0 6px;
    }
    @media all and (max-width: 767px) {
      .imageblock.border--round .background-image-holder {
        border-radius: 6px 6px 0 0;
      }
    }
    .theme--square .border--round,
    .theme--square .btn {
      border-radius: 0px;
    }
    .theme--bordered {
      border: 0.92857143em solid #252525;
    }
    .main-container.transition--fade:not(.transition--active) {
      cursor: wait;
    }
    @media all and (min-width: 1280px) {
      body.boxed-layout > section.bar-3:first-of-type {
        border-radius: 6px 6px 0 0;
      }
      body.boxed-layout .main-container > footer:last-child {
        border-radius: 0 0 6px 6px;
      }
    }
    body.boxed-layout .modal-container section:not([class*='bg-']) {
      background: none;
    }
    /*! -- Stack Helpers -- */
    @media all and (max-width: 767px) {
      .block--xs {
        margin-top: 0.92857143em;
      }
    }
    .container .container {
      max-width: 100%;
    }
    .switchable-toggle {
      cursor: pointer;
      user-select: none;
      -webkit-user-select: none;
    }
    .back-to-top {
      position: fixed;
      width: 3.71428571em;
      height: 3.71428571em;
      background: #fff;
      border-radius: 50%;
      text-align: center;
      right: 1.85714286em;
      bottom: 3.71428571em;
      padding-top: 12px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
      box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.04);
      z-index: 99;
      border: 1px solid #ececec;
      transition: 0.2s ease-out;
      -webkit-transition: 0.2s ease-out;
      -moz-transition: 0.2s ease-out;
    }
    .back-to-top i {
      color: #252525;
    }
    .back-to-top:not(.active) {
      opacity: 0;
      transform: translate3d(0, 20px, 0);
      -webkit-transform: translate3d(0, 20px, 0);
      pointer-events: none;
    }
    .back-to-top.active:hover {
      transform: translate3d(0, -5px, 0);
      -webkit-transform: translate3d(0, -5px, 0);
    }
    .disable-scroll-bars {
      -ms-overflow-style: none;
    }
    .disable-scroll-bars::-webkit-scrollbar {
      display: none;
    }
    /*! -- Stack Animations -- */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translate3d(0, 50px, 0);
        -webkit-transform: translate3d(0, 50px, 0);
      }
      to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        -webkit-font-smoothing: antialiased;
      }
    }
    @-webkit-keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translate3d(0, 50px, 0);
        -webkit-transform: translate3d(0, 50px, 0);
      }
      to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        -webkit-font-smoothing: antialiased;
      }
    }
    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translate3d(0, -100px, 0);
        -webkit-transform: translate3d(0, -100px, 0);
      }
      to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        -webkit-font-smoothing: antialiased;
      }
    }
    @-webkit-keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translate3d(0, -100px, 0);
        -webkit-transform: translate3d(0, -100px, 0);
      }
      to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        -webkit-font-smoothing: antialiased;
      }
    }
    @keyframes fadeOutUp {
      from {
        opacity: 1;
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
      }
      to {
        opacity: 0;
        transform: translate3d(0, -50px, 0);
        -webkit-transform: translate3d(0, -50px, 0);
        -webkit-font-smoothing: antialiased;
      }
    }
    @-webkit-keyframes fadeOutUp {
      from {
        opacity: 1;
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
      }
      to {
        opacity: 0;
        transform: translate3d(0, -50px, 0);
        -webkit-transform: translate3d(0, -50px, 0);
        -webkit-font-smoothing: antialiased;
      }
    }
    @keyframes fadeOutRight {
      from {
        opacity: 1;
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
      }
      to {
        opacity: 0;
        transform: translate3d(50px, 0, 0);
        -webkit-transform: translate3d(50px, 0, 0);
        -webkit-font-smoothing: antialiased;
      }
    }
    @-webkit-keyframes fadeOutRight {
      from {
        opacity: 1;
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
      }
      to {
        opacity: 0;
        transform: translate3d(50px, 0, 0);
        -webkit-transform: translate3d(50px, 0, 0);
        -webkit-font-smoothing: antialiased;
      }
    }
    @keyframes fadeInLeft {
      from {
        opacity: 0;
        transform: translate3d(-50px, 0, 0);
        -webkit-transform: translate3d(-50px, 0, 0);
      }
      to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        -webkit-font-smoothing: antialiased;
      }
    }
    @-webkit-keyframes fadeInLeft {
      from {
        opacity: 0;
        transform: translate3d(-50px, 0, 0);
        -webkit-transform: translate3d(-50px, 0, 0);
      }
      to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        -webkit-font-smoothing: antialiased;
      }
    }
    @keyframes pulse {
      0% {
        opacity: 0;
        transform: scale(1);
        -webkit-transform: scale(1);
      }
      50% {
        opacity: 1;
      }
      100% {
        opacity: 0;
        transform: scale(2);
        -webkit-transform: scale(2);
      }
    }
    @-webkit-keyframes pulse {
      0% {
        opacity: 0;
        transform: scale(1);
        -webkit-transform: scale(1);
      }
      50% {
        opacity: 1;
      }
      100% {
        opacity: 0;
        transform: scale(2);
        -webkit-transform: scale(2);
      }
    }
    @keyframes kenBurns {
      0% {
        transform: scale(1);
      }
      100% {
        transform: scale(1.1);
      }
    }
    @-webkit-keyframes kenBurns {
      0% {
        transform: scale(1);
      }
      100% {
        transform: scale(1.1);
      }
    }

    /*! -- Stack Typography -- */
    @media all and (max-width: 1024px) {
      html {
        font-size: 80%;
      }
    }
    h1,
    .h1 {
      letter-spacing: -0.01em;
    }
    h1:not(:last-child),
    .h1:not(:last-child) {
      margin-bottom: 0.59090909090909em;
    }
    @media all and (min-width: 768px) {
      h1.h1--large,
      .h1.h1--large {
        font-weight: 200;
        font-size: 4.428571428571429em;
        line-height: 1.048387096774194em;
      }
      h1.h1--large:not(:last-child),
      .h1.h1--large:not(:last-child) {
        margin-bottom: 0.419354838709677em;
      }
      h1.h1--large.type--uppercase,
      .h1.h1--large.type--uppercase {
        letter-spacing: 10px;
        margin-right: -10px;
      }
      h1.h1--large + p.lead,
      .h1.h1--large + p.lead {
        margin-top: 2.052631578947368em;
      }
    }
    h2,
    .h2 {
      margin-bottom: 0.78787878787879em;
    }
    h3,
    .h3 {
      margin-bottom: 1.04em;
    }
    h3 strong,
    .h3 strong {
      font-weight: 400;
    }
    blockquote {
      font-family: 'Merriweather', serif;
      font-style: italic;
      font-weight: 300;
    }
    blockquote:not(:last-child) {
      margin-bottom: 1.04em;
    }
    blockquote > p {
      font-size: 1em !important;
    }
    h4,
    .h4 {
      margin-bottom: 1.36842105263158em;
      font-weight: 400;
    }
    h4.inline-block + .h4.inline-block:not(.typed-text),
    .h4.inline-block + .h4.inline-block:not(.typed-text) {
      margin-left: 0.68421052631579em;
    }
    h5,
    .h5 {
      font-weight: 600;
    }
    h5:not(:last-child),
    .h5:not(:last-child) {
      margin-bottom: 1.85714286em;
    }
    h6,
    .h6 {
      font-weight: 700;
    }
    h6:not(:last-child),
    .h6:not(:last-child) {
      margin-bottom: 2.16666666666667em;
    }
    h6.type--uppercase,
    .h6.type--uppercase {
      letter-spacing: 1px;
      margin-right: -1px;
    }
    span.h1:not(.inline-block),
    span.h2:not(.inline-block),
    span.h3:not(.inline-block),
    span.h4:not(.inline-block),
    span.h5:not(.inline-block),
    span.h6:not(.inline-block) {
      display: block;
    }
    b {
      font-weight: 600;
    }
    hr {
      border-color: #ECECEC;
    }
    .bg--dark hr {
      border-color: #585858;
    }
    [class*='bg-']:not(.bg--white):not(.bg--secondary) p,
    [class*='imagebg']:not(.image--light) p {
      opacity: .9;
    }
    .lead {
      font-weight: 400;
      color: #808080;
    }
    .lead:not(:last-child) {
      margin-bottom: 1.36842105263158em;
    }
    .lead + .btn:last-child {
      margin-top: 0.92857143em;
    }
    p:last-child {
      margin-bottom: 0;
    }
    p strong {
      color: #252525;
    }
    pre {
      padding: 0.92857143em;
      background: #fafafa;
      border: 1px solid #ececec;
      border-radius: 6px;
      line-height: 20px;
      max-height: 500px;
    }
    .bg--secondary > pre {
      background: #f5f5f5;
      border-color: #ddd;
    }
    .text-block:not(:last-child) {
      margin-bottom: 1.85714286em;
    }
    .text-block h2,
    .text-block .h2 {
      margin-bottom: 0.3939393939394em;
    }
    .text-block h5,
    .text-block .h5 {
      margin: 0;
    }
    .text-block h4,
    .text-block .h4 {
      margin-bottom: 0.3421052631579em;
    }
    .text-block h3,
    .text-block .h3 {
      margin-bottom: 0.52em;
    }
    @media all and (min-width: 768px) {
      div[class*='col-'] .text-block + .text-block {
        margin-top: 3.71428571em;
      }
    }
    .heading-block {
      margin-bottom: 3.71428571em;
    }
    .heading-block h1,
    .heading-block h2,
    .heading-block h3,
    .heading-block h4,
    .heading-block h5,
    .heading-block h6,
    .heading-block .h1,
    .heading-block .h2,
    .heading-block .h3,
    .heading-block .h4,
    .heading-block .h5,
    .heading-block .h6 {
      margin-bottom: 0;
    }

    /*! -- Stack Links -- */
    a {
      color: #4a90e2;
      font-weight: 700;
    }
    a:hover {
      color: #2275d7;
      text-decoration: underline;
    }
    a.block {
      font-weight: normal;
      text-decoration: none;
      color: #666666;
    }
    p a,
    span a,
    label a {
      font-size: 1em;
      text-decoration: underline;
      font-weight: 400;
      line-height: 1.85714286em;
    }
    p + a:not(.btn) {
      font-size: 0.85714286em;
      line-height: 2.16666667em;
    }
    .imagebg:not(.image--light) a {
      color: #fff;
      font-weight: 600;
    }


    /*- -- Stack Features Small -- */
    .feature:not(.boxed) {
      margin-bottom: 60px;
    }
    .feature.feature--featured:after {
      content: '';
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 4px;
      background: #4a90e2;
      left: 0;
    }
    .feature h5 {
      margin: 0;
    }
    .feature h4 {
      margin-bottom: 0.342105263157895em;
    }
    .feature h4 + p {
      max-width: 22.28571429em;
    }
    .feature i + h5 {
      margin-top: 1.85714286em;
    }
    .feature i + h4 {
      margin-top: 0.68421052631579em;
    }
    .feature i.icon--lg + h4 {
      margin-top: 1.36842105263158em;
    }
    .feature i.icon--lg + .h5 {
      margin-top: 0.92857143em;
    }
    .feature img + .boxed {
      border-radius: 0 0 6px 6px;
      border-top: none;
    }
    .imagebg:not(.image--light) .feature.bg--white a:not(.btn) {
      color: #4a90e2;
    }
    .imagebg:not(.image--light) .feature.bg--white .label {
      color: #fff;
    }
    @media all and (max-width: 767px) {
      .feature .feature__body form .row {
        margin-left: 0;
        margin-right: 0;
      }
    }
    section.text-center .feature-6 h4 + p {
      margin: 0 auto;
    }
    @media all and (min-width: 768px) {
      .row div[class*='col-']:nth-child(1):nth-last-child(3) .feature,
      .row div[class*='col-']:nth-child(2):nth-last-child(2) .feature,
      .row div[class*='col-']:nth-child(3):last-child .feature {
        margin-bottom: 0;
      }
    }
    a.block > .feature {
      transition: 0.3s ease;
      -webkit-transition: 0.3s ease;
      -moz-transition: 0.3s ease;
    }
    a.block:hover > .feature {
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
      box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.04);
    }
    .feature-1 {
      min-height: 11.14285714em;
    }
    .feature-1 p {
      margin: 0;
    }
    .feature-1 p.lead {
      min-height: 5.05263157894737em;
    }
    .feature-1 > img:first-child {
      border-radius: 6px 6px 0 0;
    }
    .feature-1 > a.block img {
      border-radius: 6px 6px 0 0;
    }
    .feature-1 > a.block + .feature__body {
      border-radius: 0 0 6px 6px;
    }
    .feature-1[class*='box-shadow'] {
      border-radius: 6px;
      transition: 0.35s ease-out;
      -webkit-transition: 0.35s ease-out;
      -moz-transition: 0.35s ease-out;
    }
    .feature-1[class*='box-shadow']:hover {
      transform: translate3d(0, -10px, 0);
      -webkit-transform: translate3d(0, -10px, 0);
      box-shadow: 0 23px 40px rgba(0, 0, 0, 0.2);
    }
    .hover-shadow {
      border-radius: 6px;
      backface-visibility: hidden;
      overflow: hidden;
      border: 1px solid #ececec;
      transition: 0.35s ease-out;
      -webkit-transition: 0.35s ease-out;
      -moz-transition: 0.35s ease-out;
    }
    .hover-shadow:hover {
      transform: translate3d(0, -10px, 0);
      -webkit-transform: translate3d(0, -10px, 0);
      box-shadow: 0 23px 40px rgba(0, 0, 0, 0.2);
    }
    .bg--dark .hover-shadow {
      border-color: #222;
    }
    .bg--dark .hover-shadow:hover {
      box-shadow: 0 23px 40px #000000;
    }
    .feature-2 {
      overflow: hidden;
    }
    .feature-2 .feature__body {
      width: 75%;
      float: right;
    }
    .feature-2 h5 {
      margin-bottom: 0.46428571em;
    }
    .feature-2 p:last-child {
      margin: 0;
    }
    .feature-2 i {
      width: 25%;
      float: left;
    }
    .feature-large .feature-2 + .feature-2:last-child {
      margin-bottom: 0;
    }
    @media all and (max-width: 990px) {
      .feature-2 .feature__body,
      .feature-2 i {
        width: 100%;
        float: none;
      }
      .feature-2 p:first-of-type {
        margin-top: 0.92857143em;
      }
    }
    .feature-3 i {
      margin-bottom: 0.16666666666667em;
    }
    .feature-3 p {
      min-height: 7.42857143em;
    }
    .feature-4 .btn {
      position: absolute;
      width: 100%;
      bottom: 0;
      left: 0;
      border-radius: 0;
      padding: 0.92857143em;
    }
    .feature-4 .btn:hover {
      transform: none;
    }
    .feature-4 p {
      min-height: 9.28571429em;
    }
    .feature-4 p:last-of-type {
      margin-bottom: 3.71428571em;
    }
    .feature-5 i {
      width: 25%;
      float: left;
    }
    .feature-5 .feature__body {
      width: 75%;
      float: right;
    }
    .feature-5 p {
      min-height: 5.57142857em;
    }
    .feature-5 p:last-of-type {
      margin-bottom: 0.92857143em;
    }
    .feature-5:not([class*='bg-']) {
      color: #252525;
    }
    .feature-6 p {
      min-height: 9.28571429em;
    }
    .feature-6 p:last-child {
      margin: 0;
    }
    .feature-7 {
      height: 13em;
      margin-bottom: 30px;
    }
    .feature-7[data-overlay]:before {
      border-radius: 6px;
      transition: 0.3s ease;
      -webkit-transition: 0.3s ease;
      -moz-transition: 0.3s ease;
    }
    .feature-7[data-overlay]:hover:before {
      opacity: .75;
    }
    .feature-7 .background-image-holder {
      border-radius: 6px;
    }
    .feature-7 h3 {
      margin: 0;
    }
    .row--gapless .feature-7 {
      margin: 0;
      border-radius: 0;
    }
    .row--gapless .feature-7 .background-image-holder {
      border-radius: 0;
    }
    .row--gapless .feature-7:before {
      border-radius: 0;
    }
    @media all and (max-width: 767px) {
      .feature-7 .pos-vertical-center {
        top: 50%;
        transform: translate3d(0, -50%, 0);
        -webkit-transform: translate3d(0, -50%, 0);
      }
    }
    .feature-8 {
      padding: 2.78571429em 0 3.71428571em 0;
    }
    .feature-8:not(.boxed) {
      margin-bottom: 0;
    }
    .feature-8 .feature__body {
      max-width: 70%;
      margin: 0 auto;
    }
    .feature-8 p {
      min-height: 5.57142857em;
    }
    @media all and (max-width: 990px) {
      .feature-8 .feature__body {
        max-width: 85%;
      }
    }
    @media all and (max-width: 767px) {
      .feature p {
        min-height: auto;
      }
      .feature.boxed {
        margin-bottom: 15px;
      }
      .feature:not(.boxed) {
        margin-bottom: 30px;
      }
      .feature.feature-8 {
        margin-bottom: 0;
      }
    }
    .feature-8 img {
      max-height: 14.85714286em;
    }
    .feature-9 h4 {
      margin: 0;
    }
    .feature-9:not(.boxed) {
      margin-bottom: 30px;
    }
    /* -- Stack Features Large -- */
    @media all and (min-width: 768px) {
      .staggered div[class*='col-']:nth-child(2):last-child {
        margin-top: 13em;
      }
      .staggered div[class*='col-']:nth-child(2):last-child:not(:last-child) {
        margin-bottom: 9.28571429em;
      }
      .staggered div[class*='col-'] .feature:not(:last-child) {
        margin-bottom: 9.28571429em;
      }
    }
    .feature-large h4:first-child {
      margin-bottom: 0.68421052631579em;
    }
    .feature-large .feature:not(.boxed) {
      margin-bottom: 30px;
    }
    .feature-large .feature-3.text-center p {
      margin: 0 auto;
    }
    .feature-large .lead + .feature-large__group {
      margin-top: 3.71428571em;
    }
    .feature-large .feature-large__group {
      overflow: hidden;
    }
    .feature-large-1 .lead {
      margin-bottom: 2.73684210526316em;
    }
    @media all and (min-width: 768px) {
      .feature-large-2 div[class*='col-']:first-child {
        margin-top: 5.57142857em;
      }
      .feature-large-2 div[class*='col-']:last-child {
        margin-top: 7.42857143em;
      }
    }
    @media all and (max-width: 767px) {
      .feature-large-2 img {
        margin: 1.85714286em 0;
      }
    }
    .feature-large-7.switchable .boxed div[class*='col-']:only-child {
      float: none;
    }
    .feature-large-13 p.lead + .text-block {
      margin-top: 3.71428571em;
    }
    .feature-large-13 div[class*='col-'] .text-block + .text-block {
      margin-top: 2.78571429em;
    }
    @media all and (min-width: 1200px) {
      .feature-large-13:not(.text-center) .text-block p {
        max-width: 26em;
      }
    }

    /*- -- Stack Notifications -- */
    .notification {
      margin: 1.85714286em;
      box-shadow: none;
    }
    .notification:not([class*='bg--']) {
      background: none;
    }
    .notification > .boxed {
      margin: 0;
    }
    .notification > .feature,
    .notification .feature__body {
      margin-bottom: 0;
    }
    .search-box {
      width: 100%;
      margin: 0;
      padding: 1.85714286em;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
      box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.04);
    }
    .search-box.notification--reveal {
      z-index: 9999;
    }
    .search-box .notification-close-cross {
      top: 2.32142857em;
      right: 1.85714286em;
    }
    .notification-close-cross.notification-close-cross--circle {
      background: #222;
      width: 2em;
      height: 2em;
      text-align: center;
      border-radius: 50%;
      color: #fff;
    }



    /*- -- Stack Forms -- */
    .bg--dark input,
    .imagebg:not(.image--light) input,
    .bg--dark textarea,
    .imagebg:not(.image--light) textarea {
      color: #666666;
    }
    .bg--dark label,
    .imagebg:not(.image--light) label {
      color: #fff;
    }
    .bg--dark form.attempted-submit input.field-error {
      background: #D84D4D;
      color: #fff;
    }
    form {
      position: relative;
    }
    form > div[class*='col-']:not(:last-child),
    form > .row > div[class*='col-']:not(:last-child) {
      margin-bottom: 0.92857143em;
    }
    form .boxed:last-child {
      margin: 0;
    }
    form.form--clearfix {
      margin-left: -15px;
    }
    @media all and (min-width: 768px) {
      div[class*='col-'] > form div[class*='col-']:last-child:nth-child(2) {
        padding-right: 0;
      }
      div[class*='col-'] > form div[class*='col-']:first-child:nth-last-child(2) {
        padding-left: 0;
      }
      form.form--horizontal > div[class*='col-'] {
        margin: 0;
      }
    }
    @media all and (max-width: 767px) {
      .row form > .row {
        margin-left: 0;
        margin-right: 0;
      }
    }
    h2 + form,
    .h2 + form {
      margin-top: 2.78571429em;
    }
    h3 + form,
    .h3 + form,
    .lead + form {
      margin-top: 2.78571429em;
    }
    .cover .lead + form {
      margin-top: 3.71428571em;
    }
    form + span.type--fine-print {
      margin-top: 1.08333333333334em;
      display: inline-block;
    }
    .form--inline > span.h4 {
      color: #666666;
    }
    .form--inline input,
    .form--inline [class*='input-'] {
      display: inline-block;
      max-width: 200px;
    }
    .form--inline > span:not(:last-child),
    .form--inline input:not(:last-child),
    .form--inline [class*='input-']:not(:last-child) {
      margin-right: 0.92857143em;
    }
    .form--inline button {
      max-width: 200px;
    }
    .bg--dark .form--inline > span.h4,
    .imagebg:not(.image--light) .form--inline > span.h4 {
      color: #fff;
    }
    button,
    input[type="submit"] {
      height: 3.25000000000001em;
    }
    button.btn,
    input[type="submit"].btn {
      font-size: 0.85714286em;
      font-weight: 700;
      padding-left: 0;
      padding-right: 0;
    }
    button.btn.btn--primary,
    input[type="submit"].btn.btn--primary {
      color: #fff;
    }
    button.btn.type--uppercase,
    input[type="submit"].btn.type--uppercase {
      letter-spacing: .5px;
      margin-right: -0.5px;
    }
    button.checkmark.checkmark--cross,
    input[type="submit"].checkmark.checkmark--cross {
      width: 1.85714286em;
      height: 1.85714286em;
      border: none;
      background: #e23636;
    }
    button.checkmark.checkmark--cross:before,
    input[type="submit"].checkmark.checkmark--cross:before {
      content: '\00d7';
      font-size: 18px;
      top: -1px;
    }
    button[type="submit"].btn--loading:after,
    input[type="submit"][type="submit"].btn--loading:after {
      background: #4a90e2;
    }
    .bg--primary button.btn {
      border-color: rgba(255, 255, 255, 0.5);
      color: #fff;
    }
    .bg--primary button.btn:hover {
      border-color: #fff;
    }
    .bg--primary button.btn.btn--primary {
      color: #4a90e2;
      border-color: #4a90e2;
    }
    .bg--primary button.btn.btn--primary-1 {
      border-color: #31639c;
    }
    input,
    select {
      height: 2.78571429em;
    }
    input.field-error {
      border-color: #EBA8A8;
    }
    input[type] + input[type],
    input[type] + .input-checkbox,
    input[type] + button,
    input[type] + .input-select {
      margin-top: 0.92857143em;
    }
    input,
    [class*='input-'] .inner,
    select,
    textarea {
      transition: 0.3s ease;
      -webkit-transition: 0.3s ease;
      -moz-transition: 0.3s ease;
    }
    input:not([class*='col-']),
    select:not([class*='col-']),
    .input-select:not([class*='col-']),
    textarea:not([class*='col-']),
    button[type="submit"]:not([class*='col-']) {
      width: 100%;
    }
    input[type],
    select,
    textarea {
      padding-left: 0.92857143em;
    }
    input[type]:focus,
    select:focus,
    textarea:focus {
      border-color: #76abe9;
    }
    input[type="image"] {
      border: none;
      padding: none;
      width: auto;
    }
    label {
      font-size: 0.85714286em;
    }
    label + input,
    label + .inner,
    label + textarea,
    label + div[class*='input-'] {
      margin-top: 0.46428571em;
    }
    .bg--primary label,
    .bg--primary-1 label {
      color: #fff;
    }
    .input-checkbox {
      margin-top: 0.46428571em;
    }
    .input-checkbox .inner {
      background: none;
      border: 1px solid #d3d3d3;
      text-align: center;
      position: relative;
    }
    .input-checkbox .inner:not(:last-child) {
      margin-right: 0.46428571em;
    }
    .input-checkbox .inner:hover {
      border-color: #4a90e2;
    }
    .input-checkbox .inner:before {
      content: '';
      left: 0;
      border-radius: 6px;
      position: absolute;
      width: 100%;
      height: 100%;
      border: 1px solid #4a90e2;
      opacity: 0;
      transition: 0.3s ease;
      -webkit-transition: 0.3s ease;
      -moz-transition: 0.3s ease;
    }
    .input-checkbox.checked .inner {
      border-color: #4a90e2;
      background: #4a90e2;
    }
    .input-checkbox.checked .inner:after {
      content: 'L';
      transform: rotateY(180deg) rotateZ(-45deg);
      color: #fff;
      position: absolute;
      width: 100%;
      left: 0;
      top: -2px;
      font-weight: 700;
    }
    .input-checkbox.checked .inner:before {
      animation: pulse .45s ease forwards;
      -webkit-animation: pulse .45s ease forwards;
    }
    .input-checkbox + span {
      display: inline-block;
      position: relative;
      bottom: 8px;
      font-size: 0.85714286em;
      white-space: nowrap;
    }
    .input-checkbox + button[type] {
      margin-top: 0.92857143em;
    }
    .input-checkbox + span + button[type] {
      margin-top: 0.92857143em;
    }
    .bg--dark .input-checkbox:not(.checked) .inner {
      border-color: #a5a5a5;
    }
    .bg--dark .input-checkbox + span {
      opacity: .75;
    }
    .input-checkbox.input-checkbox--switch .inner {
      width: 3.71428571em;
      border-radius: 60px;
    }
    .input-checkbox.input-checkbox--switch .inner:before {
      width: 20px;
      height: 20px;
      border-radius: 50%;
      border-color: #d3d3d3;
      opacity: 1;
      left: 2px;
      top: 2px;
    }
    .input-checkbox.input-checkbox--switch .inner:hover:before {
      border-color: #4a90e2;
    }
    .input-checkbox.input-checkbox--switch.checked .inner {
      background: none;
    }
    .input-checkbox.input-checkbox--switch.checked .inner:before {
      animation: none !important;
      background: #4a90e2;
      border-color: #4a90e2;
      transform: translateX(1.85714286em);
    }
    .input-checkbox.input-checkbox--switch.checked .inner:after {
      display: none;
    }
    .input-radio .inner {
      position: relative;
      background: none;
      border: 1px solid #d3d3d3;
    }
    .input-radio .inner:hover {
      border-color: #4a90e2;
    }
    .input-radio .inner:before {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      border: 1px solid #4a90e2;
      transition: 0.3s ease;
      -webkit-transition: 0.3s ease;
      -moz-transition: 0.3s ease;
      opacity: 0;
      left: 0;
    }
    .input-radio.checked .inner {
      border-color: #4a90e2;
      background-color: #4a90e2;
    }
    .input-radio.checked .inner:after {
      content: '';
      position: absolute;
      width: 10px;
      height: 10px;
      left: 7px;
      top: 7px;
      background-color: #fff;
      border-radius: 50%;
    }
    .input-radio.checked .inner:before {
      animation: pulse .4s ease forwards;
    }
    .input-radio--innerlabel {
      transition: all .3s ease;
      height: 2.78571429em;
      line-height: 2.50714286em;
      padding: 0 0.92857143em;
      border: 1px solid #ececec;
      border-radius: 6px;
      cursor: pointer;
      width: 100%;
      text-align: center;
    }
    .input-radio--innerlabel .inner {
      display: none;
    }
    .input-radio--innerlabel label {
      pointer-events: none;
      font-weight: 600;
    }
    .input-radio--innerlabel:hover {
      border-color: #4a90e2;
    }
    .input-radio--innerlabel.checked {
      border-color: #4a90e2;
      background: #4a90e2;
      color: #fff;
    }
    .bg--primary .input-radio--innerlabel {
      border-color: #76abe9;
    }
    .bg--primary .input-radio--innerlabel:hover {
      border-color: #fff;
    }
    .bg--primary .input-radio--innerlabel.checked {
      background: #fff;
      border-color: #fff;
    }
    .bg--primary .input-radio--innerlabel.checked label {
      color: #4a90e2;
    }
    .bg--primary-1 .input-radio--innerlabel {
      border-color: #3e7cc2;
    }
    .bg--primary-1 .input-radio--innerlabel:hover {
      border-color: #fff;
    }
    .bg--primary-1 .input-radio--innerlabel.checked {
      background: #fff;
      border-color: #fff;
    }
    .bg--primary-1 .input-radio--innerlabel.checked label {
      color: #31639c;
    }
    .input-select {
      position: relative;
    }
    .input-select select {
      -moz-appearance: none;
      -webkit-appearance: none;
    }
    .input-select:not(:last-child) {
      margin-bottom: 0.92857143em;
    }
    .input-select:after {
      position: absolute;
      right: 0;
      height: 100%;
      top: 0;
      font-size: 30px;
      content: '\2263';
      pointer-events: none;
      padding: 0 13px;
      border-left: 1px solid #ececec;
      line-height: 31px;
    }
    .input-select:focus:after {
      border-color: #4a90e2;
    }
    .input-select select:focus {
      border-color: #4a90e2;
    }
    .input-number {
      position: relative;
    }
    .input-number > input[type="number"] {
      padding-left: .46428571em;
      width: 100%;
      text-align: center;
    }
    .input-number > input[type="number"]::-webkit-inner-spin-button {
      display: none;
    }
    .input-number .input-number__controls {
      position: absolute;
      height: 100%;
      width: 100%;
      right: 0;
      top: 0;
      padding: 0 0.92857143em;
    }
    .input-number .input-number__controls > span {
      position: absolute;
      display: block;
      width: 10%;
      min-width: 3.71428571em;
      height: 100%;
      cursor: pointer;
      -webkit-user-select: none;
      user-select: none;
      text-align: center;
      padding-top: 6px;
      transition: all .3s ease;
    }
    .input-number .input-number__controls > span:hover {
      color: #4a90e2;
    }
    .input-number .input-number__controls .input-number__increase {
      right: 0;
      border-left: 1px solid #ececec;
    }
    .input-number .input-number__controls .input-number__decrease {
      left: 0;
      border-right: 1px solid #ececec;
    }

    /* Custom */
    .img-circle {
        border-radius: 100%;
    }

    .img-avatar-login {
        float: left;
        margin-right: 25px;
        margin-bottom: 10px;
    }

    @isset($_GET['login'])
        @if ($_GET['login'] == 'empty' || $_GET['login'] == 'failed')
            #loginform {
                color: red;
            }
            #loginform input {
                border-color: red !important;
            }

        @endif
    @endisset

    </style>
@endsection

@section('content')

    @if ( !is_user_logged_in())

        <div class="main-container">
            <section class="imageblock switchable feature-large height-100">
            <div class="imageblock__content col-md-6 col-sm-4 pos-right">
                <div class="background-image-holder">
                    <img alt="image" src="https://s-media-cache-ak0.pinimg.com/originals/48/3f/ab/483fabff0e33d33169cc04e0653dee8b.jpg" />
                </div>
            </div>
            <div class="container pos-vertical-center">
                <div class="row">
                    <div class="col-md-5 col-sm-7">
                        <h2>{{ _e('Login')}}</h2>

                        @isset($_GET['logout'])
                            @if ($_GET['logout'] == 'success')
                                <p class="lead">
                                    Logout feito com sucesso!<br>
                                    Volter sempre!
                                </p>
                            @endif
                        @else
                            <p class="lead">
                                Bem-vindo novamente, faça login com suas credenciais de conta <strong>{{ wp_get_theme() }}</strong> existentes.
                            </p>
                        @endisset
                        {{
                            wp_login_form( array(
                                'redirect'       => home_url(),
                                'id_username'    => 'user',
                                'id_password'    => 'pass',
                                'remember'       => false,
                                'label_username' => 'Username:',
                                'label_password' => 'Password:',
                                'label_log_in'   => __( 'Sign Me In' )
                            ))
                        }}
                        <div class="row">
                            <div class="col-xs-12">
                                <span class="type--fine-print">Eita, esqueceu a senha?
                                    <a href="{{ wp_lostpassword_url( get_permalink() ) }}" title="Lost Password">Acesse aqui</a> para recupera-la!
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end of row --}}
            </div>
            {{-- end of container --}}
            </section>
        </div>

        @isset($_GET['login'])
            @if ($_GET['login'] == 'empty')

                <div class="notification pos-right pos-bottom col-sm-4 col-md-3 notification--reveal" data-animation="from-bottom" data-notification-link="trigger">
                    <div class="boxed boxed--border border--round box-shadow">
                        <img alt="avatar" class="img-avatar-login image--sm img-circle" src="https://randomuser.me/api/portraits/men/11.jpg">
                        <div class="text-block">
                            <h5>Oops!</h5>
                            <p>
                                Você deixou algum campo em branco. Por favor, entre com sua credencial!
                            </p>
                        </div>
                    </div>
                <div class="notification-close-cross notification-close"></div></div>

            @elseif ($_GET['login'] == 'failed')
                <div class="notification pos-right pos-bottom col-sm-4 col-md-3 notification--reveal" data-animation="from-bottom" data-notification-link="trigger">
                    <div class="boxed boxed--border border--round box-shadow">
                        <img alt="avatar" class="img-avatar-login image--sm img-circle" src="https://randomuser.me/api/portraits/men/11.jpg">
                        <div class="text-block">
                            <h5>Oops!</h5>
                            <p>
                                Você errou algum dos campos. Por favor, entre com sua credencial! Agora se você esqueceu ela, <a href="{{ wp_lostpassword_url( get_permalink() ) }}" title="Lost Password">acesse aqui</a> para recupera-la!
                            </p>
                        </div>
                    </div>
                <div class="notification-close-cross notification-close"></div></div>
            @endif
        @endisset

    @else
        @php
            wp_redirect(home_url());
            exit();
        @endphp
    @endif

@endsection

@section('footer-script')
    <script type="text/javascript">
        (function ($) {
            $('.background-image-holder').each(function () {
                var imgSrc = $(this).children('img').attr('src');
                $(this).css('background', 'url("' + imgSrc + '")').css('background-position', 'initial').css('opacity', '1');
                });

                // Notification login
                $('.notification-close-cross').on('click', function (e) {
                e.preventDefault();
                $(this).parent('.notification').removeClass('notification--reveal');
            });
        })(jQuery);
    </script>
@endsection
