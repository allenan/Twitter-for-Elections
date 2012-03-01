import urllib
import urllib2

# tweet retrieval
# global variables
null=None
search=['voting','votes','#voting','#primary','#primaries']
threshold = 0.75
domain = ['primary', 'GOP', 'Republican', 'republican', 'gop', 'romney', 'Romney', 'Newt', 'newt']

#simple search
class query:
	def __init__(self, q):
		self.json=eval(urllib.urlopen("http://search.twitter.com/search.json?q="+q+"&rpp=1500").read())
		self.results=self.json['results']
		self.strings = [tweet['text'] for tweet in self.results]

#given a list of queries, return a list of all of their strings
tweets=[query(str).strings for str in search]
for t in tweets:
	print len(t)
	print t	

#unvalued unordered list of potentially useful hashes
def expand_hashes(tweets):
	hashes=[]
	for string in tweets:
		if confidence(string) > threshold:
			hashes = hashes + [word for word in string.split() if word[0]=='#']
	return hashes

#unvalued unordered list of potentially useful user-references
def expand_replies(tweets):
	user_refs=[]
	for string in tweets:
		if confidence(string) > threshold:
			user_refs = user_refs + [word for word in string.split() if word[0]=='@']
	return user_refs

#tuned list of potentially useful user-references *and* hashes
def expand_search(tweets):
	dict={}
	#Again...WHAT THE FUCK AM I DOING???

for string in search:
	q=query(string)
	print q.strings
	print expand_hashes(q.strings)

#speculation: I think, I wonder, why, explain, because, I think...because, I expect, I bet, 


#real words: ignore determinates etc.
def real_words(sentence):
	return filter(lambda x: 'NN' in x[1] or 'VB' in x[1], nltk.pos_tag(nltk.word_tokenize(sentence)))


def confidence(tweet, domain):