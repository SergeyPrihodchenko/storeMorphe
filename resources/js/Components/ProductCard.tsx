export const ProductCard = () => {
    return (
        <div className="m-4 max-w-sm overflow-hidden rounded shadow-lg">
            <img
                className="w-full"
                src="https://via.placeholder.com/400"
                alt="Product Image"
            />
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
