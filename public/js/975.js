"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[975],{2975:(t,a,e)=>{e.r(a),e.d(a,{default:()=>i});const s={data:function(){return{provinceEconomicData:{id:"table_1",title:"प्रदेशको आर्थिक सूचकहरु",labels:["क्र.स.","विवरण","सूचक (प्रतिशत)"],data:[]},statusofRevenueSharing:{id:"table_2",title:"राजश्व बाँडफाँड (रु.दश लाखमा)",labels:["प्रदेश","राजश्व बाँडफाँड","प्रतिशत","स्थानीय तह","राजश्व बाँडफाँड","प्रतिशत"],data:[]},statusofRevenueSharingChartData:{labels:["प्रदेश १","मधेश","बागमती","गण्डकी","लुम्बीनी","कर्णाली","सुदूरपश्चिम"],datasets:[{backgroundColor:["#29a8ab","#5fb96c","#e6b40f","red","pink","purple","grey"],data:[17.8,18.3,16.3,10.1,16.7,9.1,11.7]}]},RevenueReceivedState:{id:"table_3",title:"प्रदेशमा प्राप्त हुने राजश्वको शिर्षकगत विवरण",labels:["क्र.स.","शिर्षक","रकम"],data:[]},BudgetResourcesStatus:{id:"table_4",title:"बजेटको स्रोतको अवस्था ",labels:["क्र.स.","आय तथा राजश्व","रकम (रु.हजारमा)"],data:[]},BudgetResourcesStatusChartData:{labels:["आन्तरिक राजश्व","राजश्व बाँडफाँड","रोयल्टी बाँडफाँड","वित्तिय समानीकरण अनुदान","सशर्त अनुदान","समपुरक अनुदान","विशेष अनुदान","बैदेशिक सहायता","गत आबको बचत"],datasets:[{backgroundColor:["#29a8ab","#5fb96c","#e6b40f","red","pink","purple","grey","silver","green"],data:[1080322,7929100,39463,8544e3,4193300,1229400,613500,24610,6683961]}]},supabudget:{id:"table_5",title:"सुदूरपश्चिम प्रदेशको कूल बजेट र खर्चको अवस्था",labels:["क्र.स.","आर्थिक वर्ष","चालु","पुँजीगत","जम्मा","चालु","प्रतिशत","पुँजीगत","प्रतिशत","जम्मा","प्रतिशत"],data:[]},supabudgetChartData:{labels:["074/075","075/076","076/077","077/078","078/079"],datasets:[{backgroundColor:["#29a8ab","#5fb96c","#e6b40f","red","pink"],data:[25.5,56.5,62.8,66.8,8.9]}]},LaborandEmploymentStatus:{id:"table_6",title:"श्रम तथा रोजगारको अवस्था",labels:["प्रदेश","बेरोजगारी","जनसंख्याको अनुपातमा बेरोजगारी","श्रमशक्तिमा सहभागिताको दर"],data:[["प्रदेश १","१०.२","३४","३७.८"],["मधेश","२०.१","३१.८","३९.७"],["बागमती","७","४३.८","४७.१"],["गण्डकी","९","३२.५","३५.७"],["लुम्बीनी","११.२","३३.१","३७.३"],["कर्णाली","९.७","२४.८","२७.७"],["सुदूरपश्चिम","११.५","२४.१","२७.३"],["नेपाल","११.४","३४.२","३८.५"]]},LaborandEmploymentStatusChartData:{labels:["प्रदेश १","मधेश","बागमती","गण्डकी","लुम्बीनी","कर्णाली","सुदूरपश्चिम"],datasets:[{backgroundColor:["#29a8ab","#5fb96c","#e6b40f","red","pink","blue","green"],data:[10.2,20.1,7,9,11.2,9.7,11.5,11.4]}]},StateGovernmentHarukoDetails:{id:"table_7",title:"प्रदेशमा दर्ता भएका सहकारीहरुको विवरण",labels:["क्र.स.","बेरोजगारी","बहुउद्देश्यीय","कृषि","ऋण तथा बचत","स्वास्थ्य","सञ्चार","विधुत","जडिबुटी","वतावरण संरक्षण","प्रकाशन","अन्य","जम्मा"],data:[[1,"कैलाली","23","31","22","","","10","","2","1","5","94"],[2,"कञ्चनपुर","24","27","19","1","","6","","","","11","88"],[3,"डडेलधुरा","2","4","3","2","","","2","","","9","22"],[4,"बैतडी","2","9","17","","","2","1","","","1","32"],[5,"दार्चुला","","4","18","","","","","","","2","24"],[6,"डोटी","3","","6","","","","","","","1","10"],[7,"अछाम","12","1","16","","","2","","","","5","36"],[8,"बझाङ","3","2","12","","","","","","","1","18"],[9,"बाजुरा","4","7","15","1","2","","","","","2","31"],[{colspan:2,value:"जम्मा"},"73","85","128","4","2","20","3","2","1","37","355"]]},StateGovernmentHarukoDetailsChartData:{labels:["कैलाली","कञ्चनपुर","डडेलधुरा","बैतडी","दार्चुला","डोटी","अछाम","बझाङ","बाजुरा"],datasets:[{backgroundColor:["#29a8ab","#5fb96c","#e6b40f","red","pink","green","blue","brown","grey"],data:[94,55,22,32,24,10,66,18,31]}]}}},mounted:function(){this.fetchEconomicIndicator(),this.fetchRevenueSharing(),this.fetchRevenue(),this.fetchBudgetResource(),this.fetchTotalBudget(),this.fetchEmployeementStatus(),this.fetchSahakari()},methods:{fetchEconomicIndicator:function(){var t=this;axios.get("/api/economic-indicator").then((function(a){t.provinceEconomicData.labels=a.data.labels,t.provinceEconomicData.data=a.data.data,t.infoDatas=a.data})).catch((function(t){return console.log(t)}))},fetchRevenueSharing:function(){var t=this;axios.get("/api/revenue-sharing").then((function(a){t.statusofRevenueSharing.labels=a.data.labels,t.statusofRevenueSharing.data=a.data.data,t.infoDatas=a.data})).catch((function(t){return console.log(t)}))},fetchRevenue:function(){var t=this;axios.get("/api/revenue").then((function(a){t.RevenueReceivedState.labels=a.data.labels,t.RevenueReceivedState.data=a.data.data,t.infoDatas=a.data})).catch((function(t){return console.log(t)}))},fetchBudgetResource:function(){var t=this;axios.get("/api/budget-resource").then((function(a){t.BudgetResourcesStatus.labels=a.data.labels,t.BudgetResourcesStatus.data=a.data.data,t.infoDatas=a.data,console.log(a.data)})).catch((function(t){return console.log(t)}))},fetchTotalBudget:function(){var t=this;axios.get("/api/total-budget").then((function(a){t.supabudget.labels=a.data.labels,t.supabudget.data=a.data.data,t.infoDatas=a.data,console.log(a.data)})).catch((function(t){return console.log(t)}))},fetchEmployeementStatus:function(){var t=this;axios.get("/api/employeement-status").then((function(a){t.LaborandEmploymentStatus.labels=a.data.labels,t.LaborandEmploymentStatus.data=a.data.data,t.infoDatas=a.data,console.log(a.data)})).catch((function(t){return console.log(t)}))},fetchSahakari:function(){var t=this;axios.get("/api/sahakari").then((function(a){t.StateGovernmentHarukoDetails.labels=a.data.labels,t.StateGovernmentHarukoDetails.data=a.data.data,t.infoDatas=a.data,console.log(a.data)})).catch((function(t){return console.log(t)}))}}};const i=(0,e(1900).Z)(s,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"container-fluid my-div"},[e("div",{staticClass:"container-fluid py-5"},[e("div",{staticClass:"row"},[t._m(0),t._v(" "),e("div",{staticClass:"col-xl-8 col-lg-7 col-md-12"},[e("div",{staticClass:"container py-5"},[e("h1",{staticClass:"page-title"},[t._v("आर्थिक अवस्था")]),t._v(" "),e("data-viewer",{attrs:{data:t.provinceEconomicData}}),t._v(" "),e("data-viewer",{attrs:{data:t.statusofRevenueSharing}},[e("template",{slot:"chart"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-6"},[e("pie-chart",{attrs:{"chart-data":t.statusofRevenueSharingChartData,width:200,height:200}})],1),t._v(" "),e("div",{staticClass:"col-md-6"},[e("bar-chart",{attrs:{"chart-data":t.statusofRevenueSharingChartData,width:200,height:200}})],1)])])],2),t._v(" "),e("data-viewer",{attrs:{data:t.RevenueReceivedState}}),t._v(" "),e("data-viewer",{attrs:{data:t.BudgetResourcesStatus}},[e("template",{slot:"chart"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-6"},[e("pie-chart",{attrs:{"chart-data":t.BudgetResourcesStatusChartData,width:200,height:200}})],1),t._v(" "),e("div",{staticClass:"col-md-6"},[e("bar-chart",{attrs:{"chart-data":t.BudgetResourcesStatusChartData,width:200,height:200}})],1)])])],2),t._v(" "),e("data-viewer",{attrs:{data:t.supabudget}},[e("template",{slot:"thead-top"},[e("tr",[e("th",{attrs:{colspan:"2"}}),t._v(" "),e("th",{staticClass:"bg-light text-center font-weight-bold",attrs:{colspan:"3"}},[t._v("बजेट (रु. हजारमा)")]),t._v(" "),e("th",{staticClass:"bg-light text-center font-weight-bold",attrs:{colspan:"6"}},[t._v("खर्च (रु. हजारमा)")])])]),t._v(" "),e("template",{slot:"chart"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-6"},[e("pie-chart",{attrs:{"chart-data":t.supabudgetChartData,width:200,height:200}})],1),t._v(" "),e("div",{staticClass:"col-md-6"},[e("bar-chart",{attrs:{"chart-data":t.supabudgetChartData,width:200,height:200}})],1)])])],2),t._v(" "),e("data-viewer",{attrs:{data:t.LaborandEmploymentStatus}},[e("template",{slot:"chart"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-6"},[e("pie-chart",{attrs:{"chart-data":t.LaborandEmploymentStatusChartData,width:200,height:200}})],1),t._v(" "),e("div",{staticClass:"col-md-6"},[e("bar-chart",{attrs:{"chart-data":t.LaborandEmploymentStatusChartData,width:200,height:200}})],1)])])],2),t._v(" "),e("data-viewer",{attrs:{data:t.StateGovernmentHarukoDetails}},[e("template",{slot:"chart"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-6"},[e("pie-chart",{attrs:{"chart-data":t.StateGovernmentHarukoDetailsChartData,width:200,height:200}})],1),t._v(" "),e("div",{staticClass:"col-md-6"},[e("bar-chart",{attrs:{"chart-data":t.StateGovernmentHarukoDetailsChartData,width:200,height:200}})],1)])])],2)],1)])])])])}),[function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"col-xl-2 col-lg-3 col-md-4 side-client-menus"},[e("div",{staticClass:"col-xl-12 col-lg-12 col-md-12 main-content"},[e("div",{staticStyle:{height:"80px"}}),t._v(" "),e("div",{staticClass:"list-set"},[e("ul",{staticClass:"table-list ",staticStyle:{overflow:"auto"}},[e("li",{staticClass:"my-3"},[e("a",{attrs:{href:"#table_1"}},[t._v("प्रदेशको आर्थिक सूचकहरु")])]),t._v(" "),e("li",{staticClass:"my-3"},[e("a",{attrs:{href:"#table_2"}},[t._v("राजश्व बाँडफाँड (रु.दश लाखमा)")])]),t._v(" "),e("li",{staticClass:"my-3"},[e("a",{attrs:{href:"#table_3"}},[t._v("प्रदेशमा प्राप्त हुने राजश्वको शिर्षकगत विवरण")])]),t._v(" "),e("li",{staticClass:"my-3"},[e("a",{attrs:{href:"#table_4"}},[t._v("बजेटको स्रोतको अवस्था")])]),t._v(" "),e("li",{staticClass:"my-3"},[e("a",{attrs:{href:"#table_5"}},[t._v("सुदूरपश्चिम प्रदेशको कूल बजेट र खर्चको अवस्था")])]),t._v(" "),e("li",{staticClass:"my-3"},[e("a",{attrs:{href:"#table_6"}},[t._v("श्रम तथा रोजगारको अवस्था")])]),t._v(" "),e("li",{staticClass:"my-3"},[e("a",{attrs:{href:"#table_7"}},[t._v("प्रदेशमा दर्ता भएका सहकारीहरुको विवरण")])])])])])])}],!1,null,null,null).exports}}]);