export const ProductCard = () => {
    return (
        <div className="m-4 max-w-sm overflow-hidden rounded shadow-lg">
            <div className="column-flex items-center bg-white p-4 shadow">
                <img
                    className="w-full"
                    src="storage/velo.webp"
                    alt="Product Image"
                />
                <div className="flex">
                    <img
                        className="w-1/3"
                        src="storage/velo.webp"
                        alt="Product Image"
                    />
                    <img
                        className="w-1/3"
                        src="storage/velo.webp"
                        alt="Product Image"
                    />
                    <img
                        className="w-1/3"
                        src="storage/velo.webp"
                        alt="Product Image"
                    />
                </div>
            </div>
            <div className="px-6 py-4">
                <div className="mb-2 text-xl font-bold">Название товара</div>
                <p className="text-base text-gray-700">
                    Краткое описание товара. Здесь можно указать его
                    характеристики и преимущества.
                </p>
            </div>
            <div className="px-6 py-4">
                <button className="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">
                    Купить
                </button>
            </div>
        </div>
    );
};
