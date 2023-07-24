import telebot

bot = telebot.TeleBot('6340234154:AAF0DM3HgKUVFr7mGiibOELHRvrKmi-Tivo')

@bot.message_handler(commands=['start'])
def handle_start(message):
    bot.send_message(message.chat.id, 'Hello!')

@bot.message_handler(func=lambda message: True)
def handle_text_message(message):
    bot.send_message(message.chat.id, f"Your chat ID is: {message.chat.id}")

bot.polling(none_stop=True)
