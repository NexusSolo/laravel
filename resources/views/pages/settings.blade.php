@extends('layouts.contentLayoutMaster1')
{{-- page title --}}
@section('title','Settings - G-Payments')
{{-- vendor styles --}}
@section('vendor-styles')
@endsection
{{-- page styles --}}
@section('page-styles')
@endsection

@section('content')
<section id="settings">
  <!--
  <div class="settings-header">
    <h2>Product settings</h2>
    <p>Manage Stripe products for your Dashboard.</p>
  </div>
  <div >
    <div class="row settings-header">
      <div class="col border-right">
        <div class="settings-m-element min-height-210">
          <h4 class="">
            <span>
              <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg ProductIcon-svg" height="20" width="20" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g fill="none"><circle cx="16" cy="16" fill="#9fcdff" r="16"></circle><path d="M20.667 6H3.513a16 16 0 0 0-3.16 13.333h10.98L10 16.667a4 4 0 1 1 4-4L22 14V7.333C22 6.597 21.403 6 20.667 6z" fill="#5469d4"></path><path d="M29.173 12.667h-17.84c-.736 0-1.333.597-1.333 1.333v10.667c0 .736.597 1.333 1.333 1.333h14.794c.382.001.746-.161 1-.447A14.613 14.613 0 0 0 30.5 13.807a1.333 1.333 0 0 0-1.327-1.14zM22 23.333a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" fill="#fff"></path></g></svg>
            </span>
            Payments
          </h4>
          <p>Accept payments globally.</p>
          <ul style="list-style: none;">
            <li><a href="#">Checkout settings</a></li>
            <li><a href="#">Payment methods</a></li>
          </ul>
        </div>
      </div>
      <div class="col border-right">
        <div class="settings-m-element min-height-210">
          <h4 class="">
            <span>
              <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg ProductIcon-svg" height="20" width="20" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g fill="none"><circle cx="16" cy="16" fill="#85d996" r="16"></circle><path d="M23.387 3.333A14.667 14.667 0 0 0 1.833 19.807a.76.76 0 0 0 1.5-.214 10.667 10.667 0 0 1 16-9.366c1.38.8 1.474 2.093 2 3.686.96 2.914.807 6.134-1.84 7.767a.727.727 0 0 0 .52 1.333 10.667 10.667 0 0 0 3.374-19.68z" fill="#fff"></path><circle cx="16" cy="16" fill="#09825d" r="6.667"></circle></g></svg>
            </span>
            Billing
          </h4>
          <p>Create and manage subscriptions and invoices.</p>
          <ul style="list-style: none;">
            <li><a href="#">Subscriptions and emails</a></li>
            <li><a href="#">Invoice template</a></li>
            <li><a href="#">Customer portal</a></li>
          </ul>
        </div>
      </div>
      <div class="col">
        <div class="settings-m-element min-height-210">
          <h4 class="">
            <span>
              <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg ProductIcon-svg" height="20" width="20" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g fill="none"><circle cx="16" cy="16" fill="#7fd3ed" r="16"></circle><path d="M18.907.267L11.06 7.853c-.25.25-.392.587-.393.94v1.874H20c.736 0 1.333.597 1.333 1.333v9.333h1.874c.353-.001.69-.143.94-.393l7.613-7.733A16 16 0 0 0 18.907.267z" fill="#067ab8"></path><path d="M21.333 23.207v-1.874H12A1.333 1.333 0 0 1 10.667 20v-9.333H8.793a1.333 1.333 0 0 0-.94.393l-6 6a1.333 1.333 0 0 0-.38 1.113A14.667 14.667 0 0 0 13.74 30.52c.409.054.82-.083 1.113-.373l6.074-6c.255-.247.401-.585.406-.94z" fill="#fff"></path></g></svg>
            </span>
            Connect
          </h4>
          <p>Facilitate payments and payouts for your platform.</p>
          <div class="btn btn-sm btn-white"><span href="#">Get started</span></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col border-right">
        <div class="settings-m-element min-height-210">
          <h4 class="">
            <span>
              <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg ProductIcon-svg" height="20" width="20" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g fill="none"><circle cx="16" cy="16" fill="#a450b5" r="15"></circle><path d="M27.333 4.706A16 16 0 1 0 19.086 31.7 16 16 0 0 0 32 16.04a15.947 15.947 0 0 0-4.667-11.334zm-1.866 20.76c-.167.134-.34.26-.52.387l.4 1.02c-2.453 1.98-5.153 2.5-8.846 2.5-7.167 0-11.833-4.813-11.833-12 0-6.453 3.626-10.667 9.68-10.667 4 0 6.8 1.654 7.332 3.674l3.727-3.727a1.333 1.333 0 0 1 1.926.053c2.32 2.78 3.087 5.767 3.087 9.334.007 2.94-1.753 6.88-4.973 9.446z" fill="#f0b4e4"></path><path d="M17.927 28.093c-6.5 0-9.7-4.92-9.7-8.806 0-3.887 2.4-5.94 4.666-5.94a2.92 2.92 0 0 1 2.434 1.166 1.333 1.333 0 0 0 2.006.154l4.334-4.334c-.514-2-3.287-4.586-7.334-4.586-6.04.013-10.826 5.106-10.826 11.586A12.78 12.78 0 0 0 16.5 30.067a14.667 14.667 0 0 0 9.3-3.207.667.667 0 0 0-.807-1.06 11.853 11.853 0 0 1-7.066 2.293z" fill="#fff"></path></g></svg>
            </span>
            Radar
          </h4>
          <p>Monitor fraud with machine learning.</p>
          <ul style="list-style: none;">
            <li><a href="#">Settings</a></li>
            <li><a href="#">Lists</a></li>
            <li><a href="#">Rules</a></li>
            <li><a href="#">Disputes</a></li>
          </ul>
          <div class="btn btn-sm btn-white disabled"><span href="#">Try Radar for Fraud Teams</span></div>
        </div>
      </div>
      <div class="col border-right">
        <div class="settings-m-element min-height-210">
          <h4 class="">
            <span>
              <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg ProductIcon-svg" height="20" width="20" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g fill="none"><circle cx="16" cy="16" fill="#c7c2ea" r="16"></circle><path d="M12 16h9.333v-.08c0-9.92-9.333-14-9.333-14A14.707 14.707 0 0 0 2.8 9.6c-.192.413-.16.896.087 1.28A10.667 10.667 0 0 0 12 16zm9.333.08C6 16.08 12 30.08 12 30.08c3.26.916 6.734.68 9.84-.667.487-.2.81-.667.827-1.193v-2.887a8 8 0 0 1 6.88-7.92 1.287 1.287 0 0 0 1.12-1.26V16h-9.334z" fill="#fff"></path><path d="M1.833 23.44A16.033 16.033 0 0 0 12 31.493v-4.826a9.333 9.333 0 0 1 8.133-9.254 1.333 1.333 0 0 0 1.2-1.333V16H12c-4.648 0-8.76 3.01-10.167 7.44zm28.834-7.567a1.333 1.333 0 0 0-1.114-1.28 8 8 0 0 1-6.886-7.926V1.453A16.053 16.053 0 0 0 12 .507v4.826a9.333 9.333 0 0 0 8.133 9.26 1.333 1.333 0 0 1 1.2 1.334V16h9.334z" fill="#8260c3"></path></g></svg>
            </span>
            Sigma custom reports
          </h4>
          <p>Get instant insights with SQL reporting.</p>
          <ul style="list-style: none;">
            <li class="disabled"><a href="#">Settings</a></li>
          </ul>
          <div class="btn btn-sm btn-white"><span href="#">Start free trial</span></div>
        </div>
      </div>
      <div class="col"></div>
    </div>
  </div>


  <div class="settings-header mt-5">
    <h2>Explore more products</h2>
    <p>Add other Stripe products to your Dashboard.</p>
  </div>
  <div >
    <div class="row">
      <div class="col">
        <div class="settings-card">
          <div class="settings-m-element">
            <h4 class="">
                  <span>
                    <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg ProductIcon-svg" height="20" width="20" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><circle cx="16" cy="16" fill="#87bbfd" r="16"></circle><path d="M25.513 5.333h-12.18A2.667 2.667 0 0 0 10.667 8v2H3.06a.667.667 0 0 0-.62.407 15 15 0 0 0-.96 3.513.667.667 0 0 0 .667.747h8.52V24a2.667 2.667 0 0 0 2.666 2.667h12.18c.352 0 .69-.14.94-.387 5.608-5.706 5.608-14.854 0-20.56a1.333 1.333 0 0 0-.94-.387z" fill="#fff"></path><path d="M30.833 10H10.667v4.667H31.94c-.133-1.6-.5-3.174-1.107-4.667z" fill="#5469d4"></path></g></svg>
                  </span>
              Issuing
            </h4>
            <p>Create virtual and physical cards.</p>
            <div class="btn plus-btn disabled">
              <span><svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--add-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M9 7h6a1 1 0 0 1 0 2H9v6a1 1 0 0 1-2 0V9H1a1 1 0 1 1 0-2h6V1a1 1 0 1 1 2 0z" fill-rule="evenodd"></path></svg></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="settings-card">
          <div class="settings-m-element">
            <h4 class="">
                  <span>
                    <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg ProductIcon-svg" height="20" width="20" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M25.333 5.333H6.667L.127 18C1.139 25.996 7.94 31.99 16 31.99c8.06 0 14.861-5.994 15.873-13.99z" fill="#9fcdff"></path><path d="M6.667 16v10.32a2 2 0 0 0 .86 1.68 14.667 14.667 0 0 0 16.946 0 2 2 0 0 0 .86-1.68V16z" fill="#fff"></path><path d="M16 0A16 16 0 0 0 .127 18h31.746A16 16 0 0 0 16 0zm9.333 14H6.667V9.333a2.667 2.667 0 0 1 2.666-2.666h13.334a2.667 2.667 0 0 1 2.666 2.666z" fill="#5469d4" fill-rule="nonzero"></path></g></svg>
                  </span>
              Terminal
            </h4>
            <p>Accept payments in person.</p>
            <div class="btn plus-btn">
              <span><svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--add-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M9 7h6a1 1 0 0 1 0 2H9v6a1 1 0 0 1-2 0V9H1a1 1 0 1 1 0-2h6V1a1 1 0 1 1 2 0z" fill-rule="evenodd"></path></svg></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="settings-card">
          <div class="settings-m-element">
            <h4 class="">
                  <span>
                    <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg ProductIcon-svg" height="20" width="20" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g fill="none"><circle cx="16" cy="16" fill="#efc078" r="16"></circle><path d="M15.373 1.727L4.38 24.273a.7.7 0 0 0 .82.98l10.8-3.08V1.333a.667.667 0 0 0-.627.394z" fill="#fff"></path><path d="M27.62 24.273L16.627 1.727A.667.667 0 0 0 16 1.333v20.84l10.793 3.08a.7.7 0 0 0 .827-.98z" fill="#bb5504"></path></g></svg>
                  </span>
              Atlas
            </h4>
            <p>Incorporate your business.</p>
            <div class="btn plus-btn">
              <span><svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--add-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M9 7h6a1 1 0 0 1 0 2H9v6a1 1 0 0 1-2 0V9H1a1 1 0 1 1 0-2h6V1a1 1 0 1 1 2 0z" fill-rule="evenodd"></path></svg></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="settings-card">
          <div class="settings-m-element">
            <h4 class="">
                  <span>
                    <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg ProductIcon-svg" height="20" width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill="#85D996" d="M10 0C4.475 0 0 4.475 0 10v.037C.019 15.544 4.487 20 10 20c5.525 0 10-4.475 10-10S15.525 0 10 0zm0 1c3.944 0 7.3 2.544 8.513 6.075L10 10C7.8 8.469 5.381 6.444 3.381 6.444c-.731 0-1.375.244-1.894.631C2.7 3.544 6.056 1 10 1zM3.381 12.938h-.025v-.006c-1.706 0-2.275-1.356-2.35-2.594C1 10.225 1 10.112 1 10c.025-1.281.85-2.588 2.356-2.588 1.419 0 3.256 1.206 5.037 2.475.294.206.588.419.869.619-1.893 1.263-3.993 2.432-5.881 2.432z"></path><path fill="#09825D" d="M18.513 7.075a3.132 3.132 0 0 0-1.894-.631c-2 0-4.419 2.025-6.619 3.556 2.075 1.444 4.481 2.938 6.619 2.938.862 0 1.531-.194 2.044-.506C19.606 11.869 20 10.906 20 10c0-1.069-.55-2.231-1.487-2.925z"></path></svg>
                  </span>
              Climate
            </h4>
            <p>Counteract climate change.</p>
            <div class="btn plus-btn disabled">
              <span><svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--add-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M9 7h6a1 1 0 0 1 0 2H9v6a1 1 0 0 1-2 0V9H1a1 1 0 1 1 0-2h6V1a1 1 0 1 1 2 0z" fill-rule="evenodd"></path></svg></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
  </div>

-->
  <div class="settings-header mt-5">
    <h2>Business settings</h2>
  </div>
  <div>
    <div class="row settings-header">
      <div class="col border-right">
        <div class="settings-m-element">
          <h4 class="">
            Your business
          </h4>
          <ul style="list-style: none;">
            <li><a href="#">Account details</a></li>
            <li><a href="#">Bank accounts and scheduling</a></li>
            <li><a href="#">Checkout settings</a></li>
            <li><a href="#">Branding</a></li>
            <li><a href="#">Emails</a></li>
          </ul>
        </div>
      </div>
      <div class="col border-right">
        <div class="settings-m-element">
          <h4 class="">
            Team and security
          </h4>
          <ul style="list-style: none;">
            <li><a href="{{asset('settings/team')}}">Team</a></li>
            <li><a href="#">Security history</a></li>
            <li><a href="#">Authorized applications</a></li>
          </ul>
        </div>
      </div>
      <div class="col">
        <div class="settings-m-element">
          <h4 class="">
            Compliance
          </h4>
          <ul style="list-style: none;">
            <li><a href="#">Verification</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col border-right">
        <div class="settings-m-element">
          <h4 class="">
            Reporting and documents
          </h4>
          <ul style="list-style: none;">
            <li><a href="#">Documents</a></li>
            <li><a href="#">Legacy exports</a></li>
          </ul>
        </div>
      </div>
      <div class="col border-right">
        <div class="settings-m-element">
          <h4 class="">
            Stripe beta programs
          </h4>
          <ul style="list-style: none;">
            <li class=""><a href="#">Early access features</a></li>
          </ul>
        </div>
      </div>
      <div class="col"></div>
    </div>
  </div>
</section>
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
@endsection
{{-- page scripts --}}
@section('page-scripts')
@endsection
