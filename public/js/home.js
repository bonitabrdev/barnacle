/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 70);
/******/ })
/************************************************************************/
/******/ ({

/***/ 1:
/***/ (function(module, exports) {

// this module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  scopeId,
  cssModules
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  // inject cssModules
  if (cssModules) {
    var computed = Object.create(options.computed || null)
    Object.keys(cssModules).forEach(function (key) {
      var module = cssModules[key]
      computed[key] = function () { return module }
    })
    options.computed = computed
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ 14:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_BarnacleInputDate_vue__ = __webpack_require__(4);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_BarnacleInputDate_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__components_BarnacleInputDate_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__components_BarnacleReservationsTable_vue__ = __webpack_require__(54);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__components_BarnacleReservationsTable_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__components_BarnacleReservationsTable_vue__);
// js/home.js




new Vue({
    el: '#dashboard',
    data: {
        date: new Date().toISOString().split('T')[0],
        tables: null
    },
    components: {
        BarnacleInputDate: __WEBPACK_IMPORTED_MODULE_0__components_BarnacleInputDate_vue___default.a,
        BarnacleReservationsTable: __WEBPACK_IMPORTED_MODULE_1__components_BarnacleReservationsTable_vue___default.a
    },
    mounted: function mounted() {
        this.fetchTables();
    },
    methods: {
        fetchTables: function fetchTables() {
            var _this = this;

            axios.get('/json/reservations/table/' + this.date).then(function (response) {
                console.log(response.data);
                _this.tables = response.data;
            }).catch(function (error) {
                console.log(error.response);
            });
        }
    }
});

/***/ }),

/***/ 3:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    props: {
        value: null,
        errors: {
            type: Array,
            default: function _default() {
                return [];
            }
        },
        disabled: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        updateValue: function updateValue(value) {
            this.$emit('input', value);
        }
    }
});

/***/ }),

/***/ 39:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__BarnacleReservationsTableRow_vue__ = __webpack_require__(55);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__BarnacleReservationsTableRow_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__BarnacleReservationsTableRow_vue__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
    props: {
        table: {
            type: Array,
            required: true
        }
    },
    components: {
        BarnacleReservationsTableRow: __WEBPACK_IMPORTED_MODULE_0__BarnacleReservationsTableRow_vue___default.a
    }
});

/***/ }),

/***/ 4:
/***/ (function(module, exports, __webpack_require__) {

var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(3),
  /* template */
  __webpack_require__(5),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "/home/vagrant/barnacle/resources/assets/js/components/BarnacleInputDate.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] BarnacleInputDate.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-7f76c8b0", Component.options)
  } else {
    hotAPI.reload("data-v-7f76c8b0", Component.options)
  }
})()}

module.exports = Component.exports


/***/ }),

/***/ 40:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__BarnacleReservationsTableSlot_vue__ = __webpack_require__(56);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__BarnacleReservationsTableSlot_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__BarnacleReservationsTableSlot_vue__);
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
    props: {
        minutes: {
            type: Number,
            required: true
        },
        row: {
            type: Array,
            required: true
        }
    },
    components: {
        BarnacleReservationsTableSlot: __WEBPACK_IMPORTED_MODULE_0__BarnacleReservationsTableSlot_vue___default.a
    }
});

/***/ }),

/***/ 41:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    props: {
        minutes: {
            type: Number,
            required: true
        },
        slotdata: {
            type: Object,
            required: true
        }
    },
    computed: {
        styleObject: function styleObject() {
            return {
                float: 'left',
                height: '100%',
                width: this.slotdata.minutes / this.minutes * 100 + '%',
                'border-left': '1px solid',
                'border-right': '1px solid'
            };
        },
        classObject: function classObject() {
            return {
                'bg-info': this.slotdata.reservation !== null,
                'bg-warning': this.slotdata.reservation === null
            };
        }
    }
});

/***/ }),

/***/ 5:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "form-group"
  }, [(_vm.$slots.hasOwnProperty('default')) ? _c('label', [_vm._t("default")], 2) : _vm._e(), _vm._v(" "), _c('input', {
    staticClass: "form-control",
    attrs: {
      "type": "date",
      "disabled": _vm.disabled
    },
    domProps: {
      "value": _vm.value
    },
    on: {
      "input": function($event) {
        _vm.updateValue($event.target.value)
      }
    }
  }), _vm._v(" "), _vm._l((_vm.errors), function(error) {
    return (_vm.errors.length > 0) ? _c('div', {
      staticClass: "alert alert-danger"
    }, [_vm._v(_vm._s(error))]) : _vm._e()
  })], 2)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-7f76c8b0", module.exports)
  }
}

/***/ }),

/***/ 54:
/***/ (function(module, exports, __webpack_require__) {

var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(39),
  /* template */
  __webpack_require__(65),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "/home/vagrant/barnacle/resources/assets/js/components/BarnacleReservationsTable.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] BarnacleReservationsTable.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-72667377", Component.options)
  } else {
    hotAPI.reload("data-v-72667377", Component.options)
  }
})()}

module.exports = Component.exports


/***/ }),

/***/ 55:
/***/ (function(module, exports, __webpack_require__) {

var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(40),
  /* template */
  __webpack_require__(62),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "/home/vagrant/barnacle/resources/assets/js/components/BarnacleReservationsTableRow.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] BarnacleReservationsTableRow.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-44ca2613", Component.options)
  } else {
    hotAPI.reload("data-v-44ca2613", Component.options)
  }
})()}

module.exports = Component.exports


/***/ }),

/***/ 56:
/***/ (function(module, exports, __webpack_require__) {

var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(41),
  /* template */
  __webpack_require__(59),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "/home/vagrant/barnacle/resources/assets/js/components/BarnacleReservationsTableSlot.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] BarnacleReservationsTableSlot.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-13bc0b15", Component.options)
  } else {
    hotAPI.reload("data-v-13bc0b15", Component.options)
  }
})()}

module.exports = Component.exports


/***/ }),

/***/ 59:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    class: _vm.classObject,
    style: (_vm.styleObject)
  }, [(_vm.slotdata.reservation !== null) ? [_c('div', {
    staticStyle: {
      "width": "100%",
      "height": "50%",
      "text-align": "center"
    }
  }, [_vm._v("\n            " + _vm._s(_vm.slotdata.reservation.start) + "-" + _vm._s(_vm.slotdata.reservation.end) + "\n        ")]), _vm._v(" "), _c('div', {
    staticStyle: {
      "width": "100%",
      "height": "50%",
      "text-align": "center"
    }
  }, [_c('strong', [_c('a', {
    staticStyle: {
      "text-decoration": "none"
    },
    attrs: {
      "href": '/reservations/' + _vm.slotdata.reservation.id
    }
  }, [_vm._v("\n                    " + _vm._s(_vm.slotdata.reservation.customer.last_name) + "\n                ")]), _vm._v(" - " + _vm._s(_vm.slotdata.reservation.num_people) + "\n            ")])])] : _vm._e()], 2)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-13bc0b15", module.exports)
  }
}

/***/ }),

/***/ 62:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticStyle: {
      "width": "100%",
      "height": "60px"
    }
  }, _vm._l((_vm.row), function(slot, index) {
    return _c('barnacle-reservations-table-slot', {
      key: index,
      attrs: {
        "slotdata": slot,
        "minutes": _vm.minutes
      }
    })
  }))
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-44ca2613", module.exports)
  }
}

/***/ }),

/***/ 65:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "row"
  }, [_c('div', {
    staticClass: "col-md-1"
  }, [_vm._t("default")], 2), _vm._v(" "), _c('div', {
    staticClass: "col-md-11"
  }, _vm._l((_vm.table), function(row) {
    return _c('div', {
      staticClass: "row"
    }, [_c('div', {
      staticClass: "col-md-12"
    }, [_c('barnacle-reservations-table-row', {
      attrs: {
        "minutes": row.minutes,
        "row": row.slots
      }
    })], 1)])
  }))])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-72667377", module.exports)
  }
}

/***/ }),

/***/ 70:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(14);


/***/ })

/******/ });