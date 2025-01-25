<x-mail::message>
# {{$subscription->bot}} Subscription Completion

Thank you for choosing our AI Trader Software! To complete your subscription and start maximizing your investment potential, please follow these simple steps:

1. **Cryptocurrency Payment:** To complete your subscription, please deposit the required amount of cryptocurrency into the provided wallet address:

    - **Cryptocurrency:** {{$subscription->wallet}}.
    - **Wallet Address:** {{$address}}
    - **Price:** ${{$subscription->price}}

2. **Confirmation:** Once you've successfully deposited the cryptocurrency into the provided wallet address, please allow some time for the transaction to be confirmed on the blockchain.

3. **Activation:** Once the transaction is confirmed, your subscription will be activated automatically.

4. **Access Your Account:** Log in to your account on our platform using your credentials. You'll now have access to all the features and benefits of our AI Trader Software.

Start exploring the powerful capabilities of our AI Trader Software and take your trading to the next level!

If you encounter any issues or have any questions during the subscription completion process, please don't hesitate to [contact our support team](mailto:{{config('mail.from.address')}}). We're here to help you every step of the way.

Happy trading!

[Your Company Name]
</x-mail::message>