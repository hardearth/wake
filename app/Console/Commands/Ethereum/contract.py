import json
from web3.exceptions import TimeExhausted
from web3 import Web3
import argparse
import mysql.connector
from mysql.connector import Error

def getEnv(clave_buscada):
    filepath = "../../../../.env"

    try:
        with open(filepath, 'r') as f:
            for linea in f.readlines():
                # Ignorar líneas vacías y comentarios
                if linea.strip() and not linea.startswith('#'):
                    clave, valor = linea.strip().split('=', 1)
                    if clave == clave_buscada:
                        valor = valor.strip("'\"")
                        return valor
    except Exception as e:
        print(f"Error al leer el archivo .env: {e}")
    return None


# Conectándose a un nodo Ethereum local (por ejemplo, Ganache)
w3 = Web3(Web3.HTTPProvider('https://polygon.llamarpc.com/'))

# Asegurarse de que está conectado
assert w3.is_connected()
#https://polygonscan.com/address/0x754e7efe604f15cb427ea63903a89b3d50e17de3
CONTRACT_ADDRESS = Web3.to_checksum_address('0x754e7efe604f15cb427ea63903a89b3d50e17de3')
FROM_ADDRESS = Web3.to_checksum_address('0x4C8325a969eC228F9658D73BD883EfE6B2871341')
PRIVATE_KEY = '30b23867247a987eddfcb04d5a630b23e3b995c80f4ea9fbc1183dc8314a9239'

# ABI del contrato (este es solo un placeholder, necesitarás el ABI real del contrato)
CONTRACT_ABI = '[{"inputs":[{"internalType":"address","name":"_masterWallet","type":"address"}],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"uint256","name":"_id","type":"uint256"},{"indexed":false,"internalType":"string","name":"_name","type":"string"},{"indexed":false,"internalType":"uint256","name":"_percent","type":"uint256"}],"name":"LevelRemoved","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"address","name":"account","type":"address"}],"name":"Paused","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"bytes32","name":"role","type":"bytes32"},{"indexed":true,"internalType":"bytes32","name":"previousAdminRole","type":"bytes32"},{"indexed":true,"internalType":"bytes32","name":"newAdminRole","type":"bytes32"}],"name":"RoleAdminChanged","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"bytes32","name":"role","type":"bytes32"},{"indexed":true,"internalType":"address","name":"account","type":"address"},{"indexed":true,"internalType":"address","name":"sender","type":"address"}],"name":"RoleGranted","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"bytes32","name":"role","type":"bytes32"},{"indexed":true,"internalType":"address","name":"account","type":"address"},{"indexed":true,"internalType":"address","name":"sender","type":"address"}],"name":"RoleRevoked","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"address","name":"from","type":"address"},{"indexed":false,"internalType":"uint256","name":"amount","type":"uint256"},{"indexed":false,"internalType":"uint256","name":"timestamp","type":"uint256"}],"name":"Transfer","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"address","name":"account","type":"address"}],"name":"Unpaused","type":"event"},{"inputs":[],"name":"ADMIN_ROLE","outputs":[{"internalType":"bytes32","name":"","type":"bytes32"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"AGENT_ROLE","outputs":[{"internalType":"bytes32","name":"","type":"bytes32"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"DEFAULT_ADMIN_ROLE","outputs":[{"internalType":"bytes32","name":"","type":"bytes32"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"SYSTEM_ROLE","outputs":[{"internalType":"bytes32","name":"","type":"bytes32"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_id","type":"uint256"},{"internalType":"string","name":"_name","type":"string"},{"internalType":"uint256","name":"_percent","type":"uint256"}],"name":"addLevel","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"_id","type":"uint256"}],"name":"deleteLevel","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"levelId","type":"uint256"}],"name":"getLevelById","outputs":[{"internalType":"uint256","name":"id","type":"uint256"},{"internalType":"string","name":"name","type":"string"},{"internalType":"uint256","name":"percent","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"getLevels","outputs":[{"components":[{"internalType":"uint256","name":"id","type":"uint256"},{"internalType":"string","name":"name","type":"string"},{"internalType":"uint256","name":"percent","type":"uint256"}],"internalType":"struct PaymentGaterway.Level[]","name":"","type":"tuple[]"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_percent","type":"uint256"}],"name":"getLevelsByPercent","outputs":[{"components":[{"internalType":"uint256","name":"id","type":"uint256"},{"internalType":"string","name":"name","type":"string"},{"internalType":"uint256","name":"percent","type":"uint256"}],"internalType":"struct PaymentGaterway.Level[]","name":"","type":"tuple[]"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"bytes32","name":"role","type":"bytes32"}],"name":"getRoleAdmin","outputs":[{"internalType":"bytes32","name":"","type":"bytes32"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"getWallet","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"bytes32","name":"role","type":"bytes32"},{"internalType":"address","name":"account","type":"address"}],"name":"grantRole","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"bytes32","name":"role","type":"bytes32"},{"internalType":"address","name":"account","type":"address"}],"name":"hasRole","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"pause","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"paused","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address[]","name":"wallets","type":"address[]"},{"internalType":"uint256[]","name":"levels","type":"uint256[]"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"payCommisions","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"bytes32","name":"role","type":"bytes32"},{"internalType":"address","name":"account","type":"address"}],"name":"renounceRole","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"bytes32","name":"role","type":"bytes32"},{"internalType":"address","name":"account","type":"address"}],"name":"revokeRole","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"wallet","type":"address"}],"name":"setWallet","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"bytes4","name":"interfaceId","type":"bytes4"}],"name":"supportsInterface","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"token","outputs":[{"internalType":"contract IERC20","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"unpause","outputs":[],"stateMutability":"nonpayable","type":"function"}]'

# Crear una instancia del contrato
contract = w3.eth.contract(address=CONTRACT_ADDRESS, abi=CONTRACT_ABI)


def pay_commissions(wallets, levels, amount):
    print(wallets,levels,amount)
    nonce = w3.eth.get_transaction_count(FROM_ADDRESS)
    print(nonce)

    wallets = [Web3.to_checksum_address(addr) for addr in wallets]

    txn = contract.functions.payCommisions(wallets, levels, int(amount)).build_transaction({
        #'chainId': 80001,  # Mumbai Testnet Chain ID
        'chainId': 137,  # Mumbai Testnet Chain ID
        'gas': 68000,
        'gasPrice': w3.to_wei('68', 'gwei'),
        'nonce': nonce,
    })
    signed_txn = w3.eth.account.sign_transaction(txn, PRIVATE_KEY)
    try:
        txn_hash = w3.eth.send_raw_transaction(signed_txn.rawTransaction)
        # Incrementa el tiempo de espera aquí:
        receipt = w3.eth.wait_for_transaction_receipt(txn_hash, timeout=300)  # Esperar 5 minutos
        return receipt
    except TimeExhausted:
        print(f"La transacción {txn_hash.hex()} no fue incluida en un bloque después de 5 minutos.")
        return None


def fetch_payment_contract_by_id(contract_id):
    try:
        # Parámetros de conexión
        connection = mysql.connector.connect(
            host='127.0.0.1',
            database=getEnv("DB_DATABASE"),
            user=getEnv("DB_USERNAME"),
            password=getEnv("DB_PASSWORD"),
            auth_plugin="mysql_native_password"
        )

        if connection.is_connected():
            cursor = connection.cursor(dictionary=True)
            query = "SELECT * FROM payment_contracts WHERE id = %s;"
            cursor.execute(query, (contract_id,))
            record = cursor.fetchone()

            # Extraer el campo 'wallets' que es de tipo JSON
            wallets_json = json.loads(record['wallets'])

            # Extraer las listas 'levels' y 'address' del JSON
            levels = wallets_json['levels']
            address = wallets_json['address']
            amount = record['amount']
            # address = [Web3.to_checksum_address(addr) for addr in wallets_json['address']]

            # Retornar las listas de niveles y direcciones
            return levels, address, amount

    except Error as e:
        print("Error al conectar con MySQL", e)
        return None

    finally:
        if connection.is_connected():
            cursor.close()
            connection.close()
            print("Conexión a MySQL cerrada")




def main():
    parser = argparse.ArgumentParser(description='Interactúa con un contrato Ethereum.')
    parser.add_argument('--payment_contract_id', type=int, required=True, help='Id del pago que se va a distribuir')

    args = parser.parse_args()
    levels, address, amount = fetch_payment_contract_by_id(args.payment_contract_id)

    pay_commissions(address, levels, 1)


if __name__ == '__main__':
    main()
