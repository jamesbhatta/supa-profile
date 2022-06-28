"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[851],{8501:(a,t,s)=>{s.d(t,{Z:()=>c});var l=s(3645),i=s.n(l)()((function(a){return a[1]}));i.push([a.id,".navigation-grid[data-v-9743d130]{display:grid;gap:1.5rem;grid-template-columns:repeat(3,1fr)}.navigation-grid>a[data-v-9743d130]{align-items:center;background-color:#fff;border-radius:6px;color:#2572bc;display:flex;font-size:1.5rem;font-weight:600;justify-content:center;min-height:200px;padding:10px 15px;transition:.3s ease}.navigation-grid>a[data-v-9743d130]:hover{background-color:#2572bc;color:#fff}",""]);const c=i},9851:(a,t,s)=>{s.r(t),s.d(t,{default:()=>n});var l=s(7889),i=s(2728);i.kL.register(i.Dx,i.u,i.De,i.ZL,i.uw,i.f$,i.qi);const c={components:{Bar:l.$Q,Pie:l.by},data:function(){return{infoCards:[],links:[{url:"/geographical-political-situation",name:"भौगोलिक तथा राजनीतिक अवस्था"},{url:"demographic-status",name:"जनसांख्यिक स्थिति"},{url:"/economical-situation",name:"आर्थिक अवस्था"},{url:"/social-status",name:"सामाजिक अवस्था"},{url:"/condition-of-physical-infrastructure",name:"भौतिक पूर्वाधारको अवस्था"},{url:"/status-of-tourism-development",name:"पर्यटन विकासको अवस्था"},{url:"/industry-business",name:"उद्योग ब्यवसाय"},{url:"/state-of-agricultural-sector",name:"कृषि क्षेत्रको अवस्था"},{url:"/forest-and-environment",name:"वन तथा वातावरण"},{url:"/miscellaneous",name:"विविध"}]}},mounted:function(){this.fetchInfoCards()},methods:{fetchInfoCards:function(){var a=this;axios.get("/api/info-cards").then((function(t){a.infoCards=t.data})).catch((function(a){return console.log(a)}))}}};var r=s(3379),d=s.n(r),e=s(8501),o={insert:"head",singleton:!1};d()(e.Z,o);e.Z.locals;const n=(0,s(1900).Z)(c,(function(){var a=this,t=a.$createElement,s=a._self._c||t;return s("div",{staticClass:"container py-4"},[s("div",{staticClass:"row"},[s("div",{staticClass:"col-md-3 d-none d-md-block"},[s("nav",{staticClass:"dataset-links-card"},[s("div",{staticClass:"heading"},[a._v("डाटासेटहरु")]),a._v(" "),s("div",{staticClass:"content"},a._l(a.links,(function(t,l){return s("router-link",{key:l,staticClass:"link",attrs:{to:t.url}},[s("span",[a._v(a._s(t.name))])])})),1)])]),a._v(" "),s("div",{staticClass:"col-md-9"},[a.infoCards?s("section",{attrs:{id:"profile-summary"}},[s("div",{staticClass:"info-grid"},a._l(a.infoCards,(function(t){return s("a",{key:t.id,staticClass:"info-card",class:t.card_theme,attrs:{href:t.link||"#"}},[s("div",{staticClass:"value"},[a._v(a._s(t.value))]),a._v(" "),s("div",{staticClass:"label"},[a._v(a._s(t.label))]),a._v(" "),t.icon?s("div",{staticClass:"icon"},[s("i",{class:t.icon})]):a._e()])})),0)]):a._e(),a._v(" "),s("div",{staticClass:"my-5"})])]),a._v(" "),s("div",{staticClass:"my-5"}),a._v(" "),s("div",{staticClass:"row"},[s("div",{staticClass:"col-md-3 my-3"},[s("div",{staticClass:"chart-card"},[s("div",{staticClass:"chart-body"},[s("div",{staticClass:"chart-title mb-3"},[a._v("शैक्षिक संस्था संख्या")]),a._v(" "),s("pie",{attrs:{"chart-options":{responsive:!0},"chart-data":{labels:["सामुदायिक","संस्थागत"],datasets:[{backgroundColor:["#007bff","#dc3545"],data:[4044,599]}]}}})],1)])]),a._v(" "),s("div",{staticClass:"col-md-3 my-3"},[s("div",{staticClass:"chart-card"},[s("div",{staticClass:"chart-body"},[s("div",{staticClass:"chart-title mb-3"},[a._v("भौगोलिक क्षेत्रगत क्षेत्रफल")]),a._v(" "),s("bar",{attrs:{"chart-options":{plugins:{legend:{display:!1}}},"chart-data":{labels:["हिमाली","पहाडी","तराई"],datasets:[{backgroundColor:["#007bff","#dc3545","green"],data:[8393.11,6748.78,4857.39]}]}}})],1)])]),a._v(" "),s("div",{staticClass:"col-md-6 my-3"},[s("div",{staticClass:"chart-card"},[s("div",{staticClass:"chart-body"},[s("div",{staticClass:"chart-title mb-3"},[a._v("जनसाङ्ख्यिक अवस्था")]),a._v(" "),a._m(0),a._v(" "),s("div",{staticClass:"row"},[s("div",{staticClass:"col-md-1"}),a._v(" "),s("div",{staticClass:"col-md-5"},[s("Pie",{attrs:{"chart-options":{responsive:!0},"chart-data":{datasets:[{backgroundColor:["#007bff","#dc3545"],data:[1287997,1423273]}]}}}),a._v(" "),a._m(1)],1),a._v(" "),s("div",{staticClass:"col-md-5 my-pie"},[s("Pie",{attrs:{"chart-options":{responsive:!0},"chart-data":{datasets:[{backgroundColor:["#007bff","#dc3545"],data:[1217887,1334630]}]}}}),a._v(" "),a._m(2)],1)])])])])]),a._v(" "),s("div",{staticClass:"row my-5"},[s("div",{staticClass:"col-md-6"},[s("div",{staticClass:"card"},[s("div",{staticClass:"row"},[a._m(3),a._v(" "),s("div",{staticClass:"col-md-4"},[s("Pie",{attrs:{"chart-options":{responsive:!0},"chart-data":{datasets:[{backgroundColor:["#007bff","#dc3545"],data:[91.25,90.49]}]}}}),a._v(" "),s("label",{staticClass:"col-12 text-center"},[a._v("लैङ्गिक अनुपात")])],1),a._v(" "),s("div",{staticClass:"col-md-4"},[s("Pie",{attrs:{"chart-options":{responsive:!0},"chart-data":{datasets:[{backgroundColor:["#007bff","#dc3545"],data:[1.53,.58]}]}}}),a._v(" "),s("label",{staticClass:"col-12 text-center"},[a._v("जनसंख्या बृद्धिदर")])],1),a._v(" "),s("div",{staticClass:"col-md-4"},[s("Pie",{attrs:{"chart-options":{responsive:!0},"chart-data":{datasets:[{backgroundColor:["#007bff","#dc3545"],data:[5.43,4.62]}]}}}),a._v(" "),s("label",{staticClass:"col-12 text-center"},[a._v("औषत परिवारको आकार")])],1)])]),a._v(" "),s("div",{staticClass:"col-md-4"})]),a._v(" "),s("div",{staticClass:"col-md-3"},[s("div",{staticClass:"card "},[s("div",{staticClass:"col-11"},[s("bar",{attrs:{"chart-options":{plugins:{legend:{display:!1}}},"chart-data":{labels:["कृषि क्षेत्र","उद्योग क्षेत्र","सेवा क्षेत्र"],datasets:[{backgroundColor:["#007bff","#dc3545","green"],data:[36.1,13.2,50.7]}]}}}),a._v(" "),s("label",{staticClass:"col-12 text-center"},[a._v("कूलगार्हस्थ उत्पादन")])],1)])]),a._v(" "),s("div",{staticClass:"col-md-3"},[s("div",{staticClass:"card"},[s("div",{staticClass:"col-11"},[s("bar",{attrs:{"chart-options":{plugins:{legend:{display:!1}}},"chart-data":{labels:["महिला","पुरुष","जम्मा"],datasets:[{backgroundColor:["#007bff","#dc3545","green"],data:[51.93,76.4,63.48]}]}}}),a._v(" "),s("label",{staticClass:"col-12 text-center"},[a._v("साक्षरता दर")])],1)])]),a._v(" "),a._m(4)]),a._v(" "),s("div",{staticClass:"row"},[s("div",{staticClass:"col-md-3"},[s("div",{staticClass:"card"},[s("bar",{attrs:{"chart-options":{plugins:{legend:{display:!1}}},"chart-data":{labels:["अस्पताल","प्रास्वाक","स्वास्थ्य चौकी","सा.स्वा.इकाई.","आ.स्वा.के.","पोषण गृह"],datasets:[{backgroundColor:["#007bff","#dc3545","green","grey","pink","purple"],data:[13,16,375,135,133]}]}}}),a._v(" "),s("label",{staticClass:"col-12 text-center"},[a._v("स्वास्थ्य संस्था संख्या")])],1)]),a._v(" "),s("div",{staticClass:"col-md-3"},[s("div",{staticClass:"card"},[s("pie",{attrs:{"chart-options":{responsive:!0},"chart-data":{labels:["कालोपत्रे","ग्राभेल","कच्ची"],datasets:[{backgroundColor:["#007bff","#dc3545","green"],data:[234,1158,3954]}]}}}),a._v(" "),s("label",{staticClass:"col-12 text-center"},[a._v("सडक")])],1)]),a._v(" "),s("div",{staticClass:"col-md-3"},[s("div",{staticClass:"card"},[s("bar",{attrs:{"chart-options":{responsive:!0},"chart-data":{labels:["खना पकाउने","वत्तीवाल्ने"],datasets:[{label:"दाउरा",data:[98.57],backgroundColor:"#007bff"},{label:"एलपिजीग्याँस",data:[1.07],backgroundColor:"#dc3545"},{label:"अन्यः",data:[.36],backgroundColor:"pink"},{label:"विजुली",data:[0,64.69],backgroundColor:"#00663d"},{label:"वैकल्पिक उर्जा",data:[0,3],backgroundColor:"yellow"}]}}}),a._v(" "),s("label",{staticClass:"col-12 text-center"},[a._v("उर्जा उपयोग")])],1)]),a._v(" "),s("div",{staticClass:"col-md-3"},[s("div",{staticClass:"card"},[s("pie",{attrs:{"chart-options":{responsive:!0},"chart-data":{labels:["प्रदेश","प्रतिनिधिसभा"],datasets:[{backgroundColor:["#007bff","#dc3545","green"],data:[32,16]}]}}}),a._v(" "),s("label",{staticClass:"col-12 text-center"},[a._v("निर्वाचन क्षेत्र")])],1)])]),a._v(" "),s("div",{staticClass:"row mt-5"},[s("div",{staticClass:"col-md-12"},[s("div",{staticClass:"chart-card"},[s("div",{staticClass:"chart-body"},[s("div",{staticClass:"chart-title mb-3"},[a._v("श्रम सम्बन्धि सूचक")]),a._v(" "),s("div",{staticClass:"row"},[s("div",{staticClass:"col-md-6 mybar"},[s("bar",{attrs:{"chart-options":{responsive:!0},"chart-data":{labels:["बेरोजगारी दर","श्रम शक्ति सजभागिता दर","जनसंख्या अनुपातमा रोजगार","रोजगारको क्षेत्र","रोजगार"],datasets:[{label:"पुरुष",data:[11.5,45.6,40.4],backgroundColor:"#007bff"},{label:"महिला",data:[11.5,15.7,0],backgroundColor:"#dc3545"},{label:"औपचारिक",data:[0,0,0,33.3,14.8],backgroundColor:"pink"},{label:"अनौपचारिक",data:[0,0,0,66.7,85.2],backgroundColor:"#00663d"}]}}}),a._v(" "),s("label",{staticClass:"col-12 text-center"},[a._v("(सुदुरपश्चिममा)")])],1),a._v(" "),s("div",{staticClass:"col-md-6"},[s("bar",{attrs:{"chart-options":{responsive:!0},"chart-data":{labels:["बेरोजगारी दर","श्रम शक्ति सजभागिता दर","जनसंख्या अनुपातमा रोजगार","रोजगारको क्षेत्र","रोजगार"],datasets:[{label:"पुरुष",data:[10.3,53.8,48.3],backgroundColor:"#007bff"},{label:"महिला",data:[13.1,26.3,0],backgroundColor:"#dc3545"},{label:"औपचारिक",data:[0,0,0,37.8,15.4],backgroundColor:"pink"},{label:"अनौपचारिक",data:[0,0,0,62.2,84.6],backgroundColor:"#00663d"}]}}}),a._v(" "),s("label",{staticClass:"col-12 text-center"},[a._v("(नेपालमा)")])],1)])])])])])])}),[function(){var a=this,t=a.$createElement,s=a._self._c||t;return s("div",{staticClass:"col-12"},[s("div",{staticClass:"row chart-datas"},[s("div",{staticClass:"male_num"},[s("div")]),a._v(" "),s("div",{staticClass:"female_num"},[s("div")])])])},function(){var a=this,t=a.$createElement,s=a._self._c||t;return s("div",{staticClass:"text-center year"},[s("label",[a._v("2068")])])},function(){var a=this,t=a.$createElement,s=a._self._c||t;return s("div",{staticClass:"text-center year"},[s("label",{attrs:{for:""}},[a._v("2078")])])},function(){var a=this,t=a.$createElement,s=a._self._c||t;return s("div",{staticClass:"container"},[s("div",{staticClass:"row col-12"},[s("div",{staticClass:"data2068 col-6"},[s("div")]),a._v(" "),s("div",{staticClass:"data2078 col-6"},[s("div")])])])},function(){var a=this,t=a.$createElement,s=a._self._c||t;return s("div",{staticClass:"col-md-12"},[s("div",{staticClass:"chart-body"},[s("div",{staticClass:"row"},[s("div",{staticClass:"col-md-7"},[s("div",{staticClass:"row"},[s("div",{staticClass:"card my-3"},[s("div",{staticClass:"row"})])])]),a._v(" "),s("div",{staticClass:"col-md-5"})])])])}],!1,null,"9743d130",null).exports}}]);