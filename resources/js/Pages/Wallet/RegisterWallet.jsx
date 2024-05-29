import React, {useEffect, useState} from 'react'
import {init, useConnectWallet} from '@web3-onboard/react'
import injectedModule from '@web3-onboard/injected-wallets'
import {Inertia} from '@inertiajs/inertia';
import {usePage} from "@inertiajs/react";


// Sign up to get your free API key at https://explorer.blocknative.com/?signup=true
// Required for Transaction Notifications and Transaction Preview
const apiKey = '1730eff0-9d50-4382-a3fe-89f0d34a2070'

const injected = injectedModule()

const infuraKey = '<INFURA_KEY>'
const rpcUrl = `https://mainnet.infura.io/v3/${infuraKey}`

// initialize Onboard
init({
    apiKey,
    wallets: [injected],
    chains: [
        {
            id: '0x1',
            token: 'ETH',
            label: 'Ethereum Mainnet',
            rpcUrl
        }
    ]
})

function RegisterWallet() {
    const [{wallet, connecting}, connect, disconnect] = useConnectWallet()



    const [confirmed, setConfirmed] = useState(false)

    useEffect(() => {
        if (wallet?.provider) {

            setConfirmed(true)
        } else {
            setConfirmed(false)
        }
    }, [wallet])

    const handleConnectWallet = async () => {
        await connect()
    }

    const handleDisconnectWallet = () => {
        disconnect(wallet)
        setConfirmed(false)
    }

    const handleConfirm = () => {
        const walletAddress = wallet.accounts
        console.info(walletAddress);
        // Guardar la dirección de la billetera en la base de datos utilizando Inertia
        Inertia.post('/i/wallet/save', { address: wallet.accounts[0].address }).then((response) => {
            setConfirmed(true)
        })
    }

    return (
        <div className="container">
            <div className="accordion -block-2 text-left js-accordion">
                <div className="accordion__item -dark-bg-dark-1 mt-10">
                    <div className="accordion__button py-20 px-30 bg-light-4">
                        <div className="d-flex items-center">
                            {/*<div className="icon icon-drag mr-10"></div>*/}
                            <span
                                className="text-16 lh-1 fw-500 text-dark-1">
                            <span className='mr-5'>1.</span> Instrucciones
                        </span>
                        </div>
                    </div>

                    <div className="accordion__content text-center">
                        <iframe width="560" height="315"
                                src="https://www.youtube.com/embed/M5QHwkkHgAA"
                                title="YouTube video player" frameBorder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowFullScreen></iframe>
                    </div>
                </div>
                <div className="accordion__item -dark-bg-dark-1 mt-10">
                    <div className="accordion__button py-20 px-30 bg-light-4">
                        <div className="d-flex items-center">
                            {/*<div className="icon icon-drag mr-10"></div>*/}
                            <span className="text-16 lh-1 fw-500 text-dark-1">
                            <span className='mr-5'>2.</span> Conectar wallet
                        </span>
                        </div>
                    </div>

                    <div className="accordion__content">
                        <div className="accordion__content__inner px-30 py-30">
                            <div className="d-flex">
                                {!wallet ? (
                                    <button className="button -md -purple-1 text-white sm:w-1/1" disabled={connecting}
                                            onClick={handleConnectWallet}>
                                        {connecting ? 'Conectando...' : 'Conectar'}
                                    </button>
                                ) : (
                                    <button className="button -md -outline-green-1 text-green-1 sm:w-1/1"
                                            disabled='disabled'>
                                        Conectado
                                    </button>
                                )}
                            </div>
                        </div>
                    </div>
                </div>

                <div className="accordion__item -dark-bg-dark-1 mt-10">
                    <div className="accordion__button py-20 px-30 bg-light-4">
                        <div className="d-flex items-center">
                        <span className="text-16 lh-1 fw-500 text-dark-1">
                            <span className='mr-5'>3.</span> Confirmar
                        </span>
                        </div>
                    </div>


                    <div className="accordion__content">
                        <div className="accordion__content__inner px-30 py-30">
                            {wallet && (
                                    <div className='row'>
                                        <div className="col-md-4">
                                            <div className="lh-11 fw-500 text-dark-1">Dirección</div>
                                            <div className="text-14 lh-11 mt-5">{wallet.accounts[0].address}</div>
                                        </div>
                                        <div className="col-md-4">
                                            <div className="lh-11 fw-500 text-dark-1">Proveedor</div>
                                            <div className="text-14 lh-11 mt-5">{wallet.label}</div>
                                        </div>
                                        <div className="col-md-4">
                                            <div className="lh-11 fw-500 text-dark-1">Red</div>
                                            <div className="text-14 lh-11 mt-5">{wallet.provider.chainId}</div>
                                        </div>
                                        <button type='button' onClick={handleConfirm}>Confirmar</button>

                                    </div>
                            )}
                        </div>
                    </div>

                </div>

            </div>
        </div>
    )
}

export default RegisterWallet
