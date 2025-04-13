import { PropsWithChildren, ReactElement } from 'react';

export const Body = ({
    ProductCard,
    children,
}: PropsWithChildren<{ ProductCard: ReactElement }>) => {
    const arr = [1, 2, 3];
    const elems = (elem: any) => {
        return elem;
    };
    return <>{arr.map((el) => elems(ProductCard))}</>;
};
