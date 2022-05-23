 <div class="row">
     @hasanyrole('user|super-admin')
     @if($organization->onlineApplication->exists() && !($organization->isRegistered() || $organization->isClosed()))
     <div class="col-md-4 d-flex">
         <a class="action-wrapper" href="{{ route('print.token', $organization->onlineApplication->token_number) }}" target="_blank">
             <div class="icon-wrapper blue lighten-5 p-4">
                 <div class="icon text-success"><i class="fa fa-print"></i></div>
             </div>
             <div class="label">
                 Print Token Letter
             </div>
         </a>
     </div>
     @endif
     @endhasanyrole

     @if($organization->isVerified() && !$organization->isClosed())
     {{-- @can('organization.verify') --}}
     @hasanyrole('super-admin|ward-secretary')
     <div class="col-md-4 d-flex">
         <a class="action-wrapper" href="{{ route('print.personal-sifaris', $organization) }}" target="_blank">
             <div class="icon-wrapper yellow lighten-5 p-4">
                 <div class="icon text-warning"><i class="fa fa-print"></i></div>
             </div>
             <div class="label">
                 दर्ता निवेदन छाप्नुहोस् (व्यक्तिगत)
             </div>
         </a>
     </div>

     <div class="col-md-4 d-flex">
         <a class="action-wrapper" href="{{ route('print.ward-sifaris', $organization) }}" target="_blank">
             <div class="icon-wrapper yellow lighten-5 p-4">
                 <div class="icon text-warning"><i class="fa fa-print"></i></div>
             </div>
             <div class="label">
                 दर्ता निवेदन छाप्नुहोस् (वडा द्वारा)
             </div>
         </a>
     </div>
     @endhasanyrole
     {{-- @endcan --}}
     @endif

     @if($organization->isVerified() && $organization->isRegistered() && !$organization->isClosed())
        @can('organization.register')
        <div class="col-md-4 d-flex">
            <a class="action-wrapper" href="{{ route('print.pramanpatra-front', $organization) }}" target="_blank">
                <div class="icon-wrapper amber lighten-5 p-4">
                    <div class="icon amber-text"><i class="fa fa-print"></i></div>
                </div>
                <div class="label">
                    प्रमाण पत्र छाप्नुहोस् (अगाडि)
                </div>
            </a>
        </div>
        <div class="col-md-4 d-flex">
            <a class="action-wrapper" href="{{ route('print.pramanpatra-back', $organization) }}" target="_blank">
                <div class="icon-wrapper amber lighten-5 p-4">
                    <div class="icon amber-text"><i class="fa fa-print"></i></div>
                </div>
                <div class="label">
                    प्रमाण पत्र छाप्नुहोस् (पछाडि)
                </div>
            </a>
        </div>
        <div class="col-md-4 d-flex">
            <a class="action-wrapper" href="{{ route('print.gharelu-sifaris', $organization) }}" target="_blank">
                <div class="icon-wrapper amber lighten-5 p-4">
                    <div class="icon amber-text"><i class="fa fa-print"></i></div>
                </div>
                <div class="label">
                    सिफारिस पत्र (घरेलु तथा साना उद्योग कार्यालय)
                </div>
            </a>
        </div>
        <div class="col-md-4 d-flex">
            <a class="action-wrapper" href="{{ route('print.kardata-sifaris', $organization) }}" target="_blank">
                <div class="icon-wrapper amber lighten-5 p-4">
                    <div class="icon amber-text"><i class="fa fa-print"></i></div>
                </div>
                <div class="label">
                    सिफारिस पत्र (करदाता सेवा कार्यालय)
                </div>
            </a>
        </div>
        <div class="col-md-4 d-flex">
            <a class="action-wrapper" href="{{ route('print.banijya-sifaris', $organization) }}" target="_blank">
                <div class="icon-wrapper amber lighten-5 p-4">
                    <div class="icon amber-text"><i class="fa fa-print"></i></div>
                </div>
                <div class="label">
                    सिफारिस पत्र (वाणिज्य कार्यालय)
                </div>
            </a>
        </div>
        
            @if($organization->karobarParibartans()->count())
            <div class="col-md-4 d-flex">
                <a class="action-wrapper" href="{{ route('print.karobar-paribartan', $organization) }}" target="_blank">
                    <div class="icon-wrapper amber lighten-5 p-4">
                        <div class="icon amber-text"><i class="fa fa-print"></i></div>
                    </div>
                    <div class="label">
                        कारोवार परिवर्तन सिफारिस पत्र (करदाता सेवा कार्यालय)
                    </div>
                </a>
            </div>
            @endif
        @endcan
    @endif

    {{-- Banda sifaris letters --}}
    @can('organization.register')
    @if($organization->isClosed())
       <div class="col-md-4 d-flex">
           <a class="action-wrapper" href="{{ route('print.banda-sifaris-gharelu', $organization) }}" target="_blank">
               <div class="icon-wrapper amber lighten-5 p-4">
                   <div class="icon amber-text"><i class="fa fa-print"></i></div>
               </div>
               <div class="label">
                   बन्द सिफारिस पत्र (घरेलु तथा साना उद्योग कार्यालय)
               </div>
           </a>
       </div>
       <div class="col-md-4 d-flex">
           <a class="action-wrapper" href="{{ route('print.banda-sifaris-kardata', $organization) }}" target="_blank">
               <div class="icon-wrapper amber lighten-5 p-4">
                   <div class="icon amber-text"><i class="fa fa-print"></i></div>
               </div>
               <div class="label">
                   बन्द सिफारिस पत्र (करदाता सेवा कार्यालय)
               </div>
           </a>
       </div>
       <div class="col-md-4 d-flex">
           <a class="action-wrapper" href="{{ route('print.banda-sifaris-banijya', $organization) }}" target="_blank">
               <div class="icon-wrapper amber lighten-5 p-4">
                   <div class="icon amber-text"><i class="fa fa-print"></i></div>
               </div>
               <div class="label">
                   बन्द सिफारिस पत्र (वाणिज्य कार्यालय)
               </div>
           </a>
       </div>
       @endif
   @endcan
 </div>
