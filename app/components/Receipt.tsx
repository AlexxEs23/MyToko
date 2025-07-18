import React from 'react';

interface ReceiptProps {
    noNota: string;
    tanggal: string;
    waktu: string;
    items: {
        no: number;
        nama: string;
        qty: number;
        total: number;
    }[];
    subtotal: number;
}

const Receipt: React.FC<ReceiptProps> = ({ noNota, tanggal, waktu, items, subtotal }) => {
    return (
        <div className="font-mono text-sm whitespace-pre-wrap">
            {'-'.repeat(60)}
            <div className="text-center">
                <div>TOKO BANGUNAN</div>
                <div>STRUK PEMBAYARAN</div>
                <div>{`${tanggal}, ${waktu}`}</div>
                <div>{`No. Nota: ${noNota}`}</div>
            </div>
            {'-'.repeat(60)}
            <div className="flex">
                <div className="w-8">No.</div>
                <div className="flex-1">Nama Barang</div>
                <div className="w-12 text-right">Qty</div>
                <div className="w-24 text-right">Total</div>
            </div>
            {'-'.repeat(60)}
            {items.map((item) => (
                <div key={item.no} className="flex">
                    <div className="w-8">{item.no}</div>
                    <div className="flex-1">{item.nama}</div>
                    <div className="w-12 text-right">{item.qty}</div>
                    <div className="w-24 text-right">{`Rp ${item.total.toLocaleString()}`}</div>
                </div>
            ))}
            {'-'.repeat(60)}
            <div className="flex">
                <div className="w-32">Total Item</div>
                <div className="flex-1">:</div>
                <div>{items.length}</div>
            </div>
            <div className="flex">
                <div className="w-32">Subtotal</div>
                <div className="flex-1">:</div>
                <div>{`Rp ${subtotal.toLocaleString()}`}</div>
            </div>
            <div className="flex">
                <div className="w-32">Total Bayar</div>
                <div className="flex-1">:</div>
                <div>{`Rp ${subtotal.toLocaleString()}`}</div>
            </div>
            {'-'.repeat(60)}
            <div className="text-center">
                <div>Terima Kasih</div>
                <div>Atas Kunjungan Anda</div>
            </div>
            {'-'.repeat(60)}
        </div>
    );
};

export default Receipt; 