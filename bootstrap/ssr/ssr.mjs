import React$1, { useEffect, useState } from "react";
import axios from "axios";
import DePayWidgets from "@depay/widgets";
import { usePage, useForm, createInertiaApp } from "@inertiajs/react";
import { createRoot } from "react-dom/client";
import { init, useConnectWallet } from "@web3-onboard/react";
import injectedModule from "@web3-onboard/injected-wallets";
import { Inertia } from "@inertiajs/inertia";
import createServer from "@inertiajs/react/server";
import ReactDOMServer from "react-dom/server";
function DepayWidget$1(props) {
  const openPaymentWidget = async () => {
    try {
      const { unmount: unmount2 } = await DePayWidgets.Payment({
        integration: "6ecc692a-0c20-479e-a5d4-cae6a00a5692",
        accept: [
          {
            blockchain: "polygon",
            token: "0xEeeeeEeeeEeEeeEeEeEeeEEEeeeeEeeeeeeeEEeE",
            receiver: "0xc0D74A95051a65fEda1fB47FeC9245d9583eF1E5"
          }
        ],
        amount: props.payment.amount,
        succeeded: async (transaction) => {
          try {
            const response = await axios.post("/i/track/payment/" + props.payment.id, transaction);
            if (response.data.completed === true) {
              let url = "/cart/success/" + props.payment.user_bills_id;
              window.location.href = url;
            }
          } catch (error) {
            console.error(error);
          }
        }
      });
    } catch (error) {
      console.error(error);
    }
  };
  useEffect(() => {
    return () => {
    };
  }, []);
  return /* @__PURE__ */ React$1.createElement("div", null, /* @__PURE__ */ React$1.createElement("button", { onClick: openPaymentWidget, type: "button", className: "btn btn-outline-primary btn-lg col-md-12" }, "Pay"));
}
const __vite_glob_0_0 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: DepayWidget$1
}, Symbol.toStringTag, { value: "Module" }));
function DepayWidget(props) {
  const openPaymentWidget = async () => {
    try {
      const { unmount: unmount2 } = await DePayWidgets.Payment({
        integration: "6ecc692a-0c20-479e-a5d4-cae6a00a5692",
        accept: [
          {
            blockchain: "polygon",
            token: "0xEeeeeEeeeEeEeeEeEeEeeEEEeeeeEeeeeeeeEEeE",
            receiver: "0xc0D74A95051a65fEda1fB47FeC9245d9583eF1E5"
          }
        ],
        amount: props.payment.amount,
        succeeded: async (transaction) => {
          try {
            const response = await axios.post("/i/track/payment/" + props.payment.id, transaction);
            if (response.data.completed === true) {
              let url = "/cart/success/" + props.payment.user_bills_id;
              window.location.href = url;
            }
          } catch (error) {
            console.error(error);
          }
        }
      });
    } catch (error) {
      console.error(error);
    }
  };
  useEffect(() => {
    return () => {
    };
  }, []);
  return /* @__PURE__ */ React$1.createElement("div", null, /* @__PURE__ */ React$1.createElement("button", { onClick: openPaymentWidget, type: "button", className: "btn btn-outline-primary btn-lg col-md-12" }, "Pay"));
}
function Index$1() {
  const { payment, countries, bill } = usePage().props;
  const { data, setData, post, errors } = useForm({
    name: "",
    lastname: "",
    password: ""
  });
  function handleChange(e) {
    const key = e.target.id;
    const value = e.target.value;
    setValues((values) => ({
      ...values,
      [key]: value
    }));
  }
  useEffect(() => {
  }, []);
  const handleSubmit = (e) => {
    e.preventDefault();
    post(route("form.submit"), { data });
  };
  return /* @__PURE__ */ React$1.createElement("div", null, /* @__PURE__ */ React$1.createElement("section", { "data-anim": "fade", className: "breadcrumbs is-in-view" }, /* @__PURE__ */ React$1.createElement("div", { className: "container" }, /* @__PURE__ */ React$1.createElement("div", { className: "row" }, /* @__PURE__ */ React$1.createElement("div", { className: "col-auto" }, /* @__PURE__ */ React$1.createElement("div", { className: "breadcrumbs__content" }, /* @__PURE__ */ React$1.createElement("div", { className: "breadcrumbs__item " }, /* @__PURE__ */ React$1.createElement("a", { href: "#" }, "Inicio")), /* @__PURE__ */ React$1.createElement("div", { className: "breadcrumbs__item " }, /* @__PURE__ */ React$1.createElement("a", { href: "#" }, "Checkout"))))))), /* @__PURE__ */ React$1.createElement("section", { className: "page-header -type-1" }, /* @__PURE__ */ React$1.createElement("div", { className: "container" }, /* @__PURE__ */ React$1.createElement("div", { className: "page-header__content" }, /* @__PURE__ */ React$1.createElement("div", { className: "row justify-center text-center" }, /* @__PURE__ */ React$1.createElement("div", { className: "col-auto" }, /* @__PURE__ */ React$1.createElement("div", { "data-anim": "slide-up delay-1", className: "is-in-view" }, /* @__PURE__ */ React$1.createElement("h1", { className: "page-header__title" }, "Checkout")), /* @__PURE__ */ React$1.createElement("div", { "data-anim": "slide-up delay-2", className: "is-in-view" }, /* @__PURE__ */ React$1.createElement("p", { className: "page-header__text" }, "Faltan pocos pasos para finalizar tu compra."))))))), /* @__PURE__ */ React$1.createElement("section", { className: "layout-pt-md layout-pb-lg" }, /* @__PURE__ */ React$1.createElement("div", { className: "container" }, /* @__PURE__ */ React$1.createElement("div", { className: "row y-gap-50" }, /* @__PURE__ */ React$1.createElement("div", { className: "col-lg-8" }, /* @__PURE__ */ React$1.createElement("div", { className: "shopCheckout-form" }, /* @__PURE__ */ React$1.createElement(
    "form",
    {
      onSubmit: handleSubmit,
      method: "post",
      className: "contact-form row x-gap-30 y-gap-30"
    },
    /* @__PURE__ */ React$1.createElement("div", { className: "col-12" }, /* @__PURE__ */ React$1.createElement("h5", { className: "text-20" }, "Datos de la facturación")),
    /* @__PURE__ */ React$1.createElement("div", { className: "col-sm-6" }, /* @__PURE__ */ React$1.createElement("label", { className: "text-16 lh-1 fw-500 text-dark-1 mb-10" }, "Nombre"), /* @__PURE__ */ React$1.createElement("input", { type: "text", name: "name", placeholder: "Nombre", required: true, onChange: handleChange, value: bill.name, readOnly: true })),
    /* @__PURE__ */ React$1.createElement("div", { className: "col-sm-6" }, /* @__PURE__ */ React$1.createElement("label", { className: "text-16 lh-1 fw-500 text-dark-1 mb-10" }, "Apellido"), /* @__PURE__ */ React$1.createElement("input", { type: "text", name: "lastname", placeholder: "Apellido", onChange: handleChange, value: bill.lastname, readOnly: true })),
    /* @__PURE__ */ React$1.createElement("div", { className: "col-12" }, /* @__PURE__ */ React$1.createElement("label", { className: "text-16 lh-1 fw-500 text-dark-1 mb-10" }, "Región *"), /* @__PURE__ */ React$1.createElement("select", { name: "countries_id", id: "", className: "text-16 lh-1 fw-500 text-dark-1 mb-10", value: bill.countries_id, readOnly: true }, /* @__PURE__ */ React$1.createElement("option", { value: "" }, "Seleccione..."), countries.map((countries2) => /* @__PURE__ */ React$1.createElement("option", { key: countries2.id, value: countries2.id }, countries2.name)))),
    /* @__PURE__ */ React$1.createElement("div", { className: "col-sm-6" }, /* @__PURE__ */ React$1.createElement("label", { className: "text-16 lh-1 fw-500 text-dark-1 mb-10" }, "Ciudad *"), /* @__PURE__ */ React$1.createElement("input", { type: "text", name: "city", placeholder: "Ciudad *", required: true, onChange: handleChange, value: bill.city, readOnly: true })),
    /* @__PURE__ */ React$1.createElement("div", { className: "col-sm-6" }, /* @__PURE__ */ React$1.createElement("label", { className: "text-16 lh-1 fw-500 text-dark-1 mb-10" }, "Celular"), /* @__PURE__ */ React$1.createElement("input", { type: "text", name: "cellphone", placeholder: "Teléfono *", required: true, onChange: handleChange, value: bill.cellphone, readOnly: true })),
    /* @__PURE__ */ React$1.createElement("div", { className: "col-12" }, /* @__PURE__ */ React$1.createElement("label", { className: "text-16 lh-1 fw-500 text-dark-1 mb-10" }, "Correo"), /* @__PURE__ */ React$1.createElement("input", { type: "email", name: "email", placeholder: "Correo*", required: true, onChange: handleChange, value: bill.email, readOnly: true }))
  ))), /* @__PURE__ */ React$1.createElement("div", { className: "col-lg-4" }, /* @__PURE__ */ React$1.createElement("div", { className: "" }, /* @__PURE__ */ React$1.createElement("div", { className: "pt-30 pb-15 border-light rounded-8 bg-light-4" }, /* @__PURE__ */ React$1.createElement("h5", { className: "px-30 text-20 fw-500" }, "Tu Orden"), /* @__PURE__ */ React$1.createElement("div", { className: "d-flex justify-between px-30 mt-25" }, /* @__PURE__ */ React$1.createElement("div", { className: "py-15 fw-500 text-dark-1" }, "Productos"), /* @__PURE__ */ React$1.createElement("div", { className: "py-15 fw-500 text-dark-1" }, "Subtotal"))), /* @__PURE__ */ React$1.createElement("div", { className: "py-30 px-30  mt-30 border-light rounded-8 bg-light-4" }, /* @__PURE__ */ React$1.createElement("h5", { className: "text-20 fw-500" }, "Pago"), /* @__PURE__ */ React$1.createElement("div", { className: "mt-30" }, /* @__PURE__ */ React$1.createElement(DepayWidget, { payment })))))))));
}
const __vite_glob_0_1 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: Index$1
}, Symbol.toStringTag, { value: "Module" }));
createInertiaApp({
  resolve: (name) => {
    const pages = /* @__PURE__ */ Object.assign({});
    return pages[`./Pages/${name}.jsx`];
  },
  setup({ el, App, props }) {
    createRoot(el).render(/* @__PURE__ */ React$1.createElement(App, { ...props }));
  }
});
const __vite_glob_0_2 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null
}, Symbol.toStringTag, { value: "Module" }));
const apiKey = "1730eff0-9d50-4382-a3fe-89f0d34a2070";
const injected = injectedModule();
const infuraKey = "<INFURA_KEY>";
const rpcUrl = `https://mainnet.infura.io/v3/${infuraKey}`;
init({
  apiKey,
  wallets: [injected],
  chains: [
    {
      id: "0x1",
      token: "ETH",
      label: "Ethereum Mainnet",
      rpcUrl
    }
  ]
});
function RegisterWallet() {
  const [{ wallet, connecting }, connect, disconnect] = useConnectWallet();
  const [confirmed, setConfirmed] = useState(false);
  useEffect(() => {
    if (wallet == null ? void 0 : wallet.provider) {
      setConfirmed(true);
    } else {
      setConfirmed(false);
    }
  }, [wallet]);
  const handleConnectWallet = async () => {
    await connect();
  };
  const handleConfirm = () => {
    const walletAddress = wallet.accounts;
    console.info(walletAddress);
    Inertia.post("wallet/save", { "address": walletAddress });
  };
  return /* @__PURE__ */ React$1.createElement("div", { className: "dashboard__content bg-light-4" }, /* @__PURE__ */ React$1.createElement("div", { className: "row pb-50 mb-10" }, /* @__PURE__ */ React$1.createElement("div", { className: "col-auto" }, /* @__PURE__ */ React$1.createElement("h1", { className: "text-30 lh-12 fw-700" }, "Mis Afiliados"))), /* @__PURE__ */ React$1.createElement("div", { className: "row y-gap-30" }, /* @__PURE__ */ React$1.createElement(
    "div",
    {
      className: "d-flex justify-between items-center py-35 px-30 rounded-16 bg-white -dark-bg-dark-1 shadow-4"
    },
    wallet ? /* @__PURE__ */ React$1.createElement("div", null, /* @__PURE__ */ React$1.createElement("div", null, "Dirección de la billetera: ", wallet.accounts[0].address), /* @__PURE__ */ React$1.createElement("button", { onClick: handleConfirm }, "Confirmar")) : /* @__PURE__ */ React$1.createElement("button", { disabled: connecting, onClick: handleConnectWallet }, connecting ? "Conectando..." : "Conectar")
  )));
}
const __vite_glob_0_4 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: RegisterWallet
}, Symbol.toStringTag, { value: "Module" }));
function Index() {
  return /* @__PURE__ */ React$1.createElement("div", { className: "container" }, /* @__PURE__ */ React$1.createElement("div", { className: "row y-gap-20 justify-between items-center" }, /* @__PURE__ */ React$1.createElement("div", { className: "col-xl-7 col-lg-6" }, /* @__PURE__ */ React$1.createElement("h1", null, "Hola"), /* @__PURE__ */ React$1.createElement(RegisterWallet, null))));
}
const __vite_glob_0_3 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: Index
}, Symbol.toStringTag, { value: "Module" }));
createServer(
  (page) => createInertiaApp({
    page,
    render: ReactDOMServer.renderToString,
    resolve: (name) => {
      const pages = /* @__PURE__ */ Object.assign({ "./Pages/Checkout/DePayWidget.jsx": __vite_glob_0_0, "./Pages/Checkout/Index.jsx": __vite_glob_0_1, "./Pages/Layout.jsx": __vite_glob_0_2, "./Pages/Wallet/Index.jsx": __vite_glob_0_3, "./Pages/Wallet/RegisterWallet.jsx": __vite_glob_0_4 });
      return pages[`./Pages/${name}.jsx`];
    },
    setup: ({ App, props }) => /* @__PURE__ */ React.createElement(App, { ...props })
  })
);
